<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubModule;

class SubModuleController extends Controller
{
    public function index()
    {
        $data = SubModule::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('sub-module.index')->with(compact('data'));
    }

    public function create()
    {
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        // $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        return view('sub-module.create')->with(compact('groups'));
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
            "created_by" => 1,
            "updated_by" => 1,
        );
        module::create($details);
        return redirect('/module');
    }
}
