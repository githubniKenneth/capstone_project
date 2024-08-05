<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeRoles;
use App\Http\Requests\EmployeeRoleStoreRequest;

class EmployeeRoleController extends Controller
{
    public function index()
    {
        $data = EmployeeRoles::orderBy('created_at', 'desc')->get();

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        return view('employee-role.index')->with(compact('data'));
    }

    public function create()
    {
        return view('employee-role.create');
    }

    public function store(EmployeeRoleStoreRequest $request)
    {
        $validated = $request->validated();
        $details = array(
            "empr_role" => $request->empr_role, 
            "empr_desc" => $request->empr_desc,
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        EmployeeRoles::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function show($id)
    {
        $data = EmployeeRoles::findOrFail($id);
        return view('employee-role.edit', ['employee_role' => $data]);
    }

    public function update(EmployeeRoleStoreRequest $request, EmployeeRoles $id)
    {
        $validated = $request->validated();
        
        $details = array(
            "empr_role" => $request->empr_role, 
            "empr_desc" => $request->empr_desc,
        );
        
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/personnel/employee-role/delete/".$id;
        return view('components.remove-form', compact('action'));
    }

    public function delete(EmployeeRoles $EmployeeRoles, $id)
    {
        $current_status = EmployeeRoles::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $EmployeeRoles->where('id', $id)->update($update);
        return redirect('/personnel/employee-role');
    }
}
