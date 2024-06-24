<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Group;
use App\Http\Requests\ModuleStoreRequest;

class ModuleController extends Controller
{
    public function index()
    {
        $data = Module::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('module.index')->with(compact('data'));
    }

    public function create()
    {
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        // $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        return view('module.create')->with(compact('groups'));
        // return view('module.create');
    }

    public function store(ModuleStoreRequest $request)
    {
        $validated = $request->validated();
        
        $details = array(
            "module_name" => $request->module_name,
            "group_id" => $request->group_id, 
            "module_code" => $request->module_code,
            "module_description" => $request->module_description,
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        Module::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        $data = Module::findOrFail($id);
        return view('module.edit', ['module' => $data, 'groups' => $groups]);
    }

    public function update(ModuleStoreRequest $request, Module $id)
    {
        $validated = $request->validated();
        
        $details = array(
            "module_name" => $request->module_name,
            "group_id" => $request->group_id, 
            "module_code" => $request->module_code,
            "module_description" => $request->module_description,
            "created_by" => 1,
            "updated_by" => 1,
        );

        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/component/module/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }

    public function delete(Module $module, $id)
    {
        $current_status = Module::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $module->where('id', $id)->update($update);
        return redirect('/component/module'); // kulang yung slug
    }
    
}
