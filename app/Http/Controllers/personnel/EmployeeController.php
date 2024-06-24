<?php

namespace App\Http\Controllers\Personnel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeRoles;
use App\Models\Branch;
use App\Http\Requests\EmployeeStoreRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::orderBy('created_at', 'desc')->get();
        return view('employee.index')->with(compact('data'));
    }

    public function create()
    {
        $branches = Branch::select('id','branch_name')->where('branch_status', 1)->get();
        $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        return view('employee.create')->with(compact('branches'))->with(compact('roles'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        // dd($request);
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
        $branches = Branch::select('id','branch_name')->where('branch_status', 1)->get();
        $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        $data = Employee::findOrFail($id);
        // dd($data);
        return view('employee.edit')->with(compact('data','branches','roles'));
    }

    public function update(EmployeeStoreRequest $request, Employee $id)
    {
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

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/personnel/employee/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }

    public function delete(Employee $employee, $id)
    {
        $current_status = Employee::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $employee->where('id', $id)->update($update);
        return redirect('/personnel/employee'); // kulang yung slug
    }

}
