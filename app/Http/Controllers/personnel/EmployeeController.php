<?php

namespace App\Http\Controllers\Personnel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeRoles;
use App\Models\Branch;
use App\Http\Requests\EmployeeStoreRequest;
use App\Helpers\PermissionHelper;

class EmployeeController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/employee', 'Read');
        $buttons = PermissionHelper::getButtonStates('/personnel/employee');
        $data = Employee::orderBy('created_at', 'desc')->get();

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        return view('employee.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/employee', 'Create');
        $branches = Branch::select('id','branch_name')->where('branch_status', 1)->get();
        $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        return view('employee.create')->with(compact('branches'))->with(compact('roles'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/employee', 'Create');
        $validated = $request->validated();
        
        $full_address = $request->emp_lot_no.' '.$request->emp_street.' '.$request->emp_brgy.' '.$request->emp_city;
        $full_name = $request->emp_first_name.' '.$request->emp_middle_name.' '.$request->emp_last_name.' '.$request->emp_suffix;
        $details = array(
            "branch_id" => $request->branch_id, 
            "empr_id" => $request->empr_id,
            "emp_first_name" => $request->emp_first_name,
            "emp_middle_name" => $request->emp_middle_name,
            "emp_last_name" => $request->emp_last_name,
            "emp_suffix" => $request->emp_suffix,
            "emp_full_name" => $full_name,
            "emp_lot_no" => $request->emp_lot_no,
            "emp_street" => $request->emp_street,
            "emp_brgy" => $request->emp_brgy,
            "emp_city" => $request->emp_city,
            "emp_full_address" => $full_address,
            "emp_tele_no" => $request->emp_tele_no,
            "emp_phone_no" => $request->emp_phone_no,
            "emp_email" => $request->emp_email,
            "status" => $request->status,
            "created_by" => $request->created_by,
            "updated_by" => $request->updated_by,
        );
        Employee::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function show($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/employee', 'Read');
        $buttons = PermissionHelper::getButtonStates('/personnel/employee');
        $branches = Branch::select('id','branch_name')->where('branch_status', 1)->get();
        $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        $data = Employee::findOrFail($id);
        // dd($data);
        return view('employee.edit')->with(compact('data','branches','roles', 'buttons'));
    }

    public function update(EmployeeStoreRequest $request, Employee $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/employee', 'Update');
        $validated = $request->validated();
        $full_address = $request->emp_lot_no.' '.$request->emp_street.' '.$request->emp_brgy.', '.$request->emp_city;
        $full_name = $request->emp_first_name.' '.$request->emp_middle_name.' '.$request->emp_last_name.' '.$request->emp_suffix;
        $details = array(
            "branch_id" => $request->branch_id, 
            "empr_id" => $request->empr_id,
            "emp_first_name" => $request->emp_first_name,
            "emp_middle_name" => $request->emp_middle_name,
            "emp_last_name" => $request->emp_last_name,
            "emp_full_name" => $full_name,
            "emp_suffix" => $request->emp_suffix,
            "emp_lot_no" => $request->emp_lot_no,
            "emp_street" => $request->emp_street,
            "emp_brgy" => $request->emp_brgy,
            "emp_city" => $request->emp_city,
            "full_address" => $full_address,
            "emp_tele_no" => $request->emp_tele_no,
            "emp_phone_no" => $request->emp_phone_no,
            "emp_email" => $request->emp_email,
            "status" => $request->status,
            "created_by" => $request->created_by,
            "updated_by" => $request->updated_by,
        );
        $id->update($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/employee', 'Remove');
        $employee = Employee::find($id);

        if ($employee) {
            $new_status = $employee->status == 1 ? 0 : 1;
            $employee->status = $new_status;

            if ($employee->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

}
