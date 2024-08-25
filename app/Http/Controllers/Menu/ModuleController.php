<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Group;
use App\Http\Requests\ModuleStoreRequest;
use App\Helpers\PermissionHelper;

class ModuleController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/module', 'Read');	
        $data = Module::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('module.index')->with(compact('data'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/module', 'Create');
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        // $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        return view('module.create')->with(compact('groups'));
        // return view('module.create');
    }

    public function store(ModuleStoreRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/module', 'Create');
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
        $is_authorized = PermissionHelper::checkAuthorization('/component/module', 'Read');
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        $data = Module::findOrFail($id);
        return view('module.edit', ['module' => $data, 'groups' => $groups]);
    }

    public function update(ModuleStoreRequest $request, Module $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/module', 'Update');
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

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/module', 'Remove');
        $module = Module::find($id);

        if ($module) {
            $new_status = $module->status == 1 ? 0 : 1;
            $module->status = $new_status;

            if ($module->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
    
}
