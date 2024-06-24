<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeRoles;
use App\Models\Group;
use App\Models\Module;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserAccessGroup;
use App\Models\UserAccessModule;
use App\Http\Requests\UserStoreRequest;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('created_at', 'desc')->get();
        return view('user.index')->with(compact('data'));
    }

    public function create()
    {
        $modules = Module::select('id','module_name', 'group_id')->where('status', 1)->get();
        $employees = Employee::select('id','emp_full_name')->where('status', 1)->get();
        $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        $permissions = Permission::select('id','name')->get();
        return view('user.create')->with(compact('employees','groups','modules','permissions','roles'));
    }

    public function store(UserStoreRequest $request)
    {
        // dd($request->emp_id);
        $validated = $request->validated();
        // dd($request->emp_id);
        $emp_id = ($request->emp_id == null) ? '0' : $request->emp_id ;
        $details = array(
            "emp_id" => $emp_id, 
            "username" => $request->username,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "status" => 1,
            "created_by" => Auth::user()->id,
        );
        // dd($details);

        User::create($details);
        return view('user.index');
    }

    
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $modules = Module::select('id','module_name', 'group_id')->where('status', 1)->get();
        $employees = Employee::select('id','emp_full_name')->where('status', 1)->get();
        $roles = EmployeeRoles::select('id','empr_role')->where('status', 1)->get();
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        $permissions = Permission::select('id','name')->get();


        // Fetch user access groups and modules
        
        $userAccessGroups = UserAccessGroup::where('user_id', $id)->get();
        $userAccessModules = UserAccessModule::where('user_id', $id)->get();
        // dd($userAccessGroups);
        return view('user.edit')->with(compact('data','employees','groups','modules','permissions','roles', 'userAccessGroups', 'userAccessModules'));
    }

    public function update(UserStoreRequest $request, User $id)
    {
        $validated = $request->validated();
        // Check if a new password is provided
        if ($request->filled('password')) {
            $password = bcrypt($request->password);
        } else {
            // If no new password provided, keep the existing password
            $password = $id->password;
        }
        
        // $validated = $request->validated();
        $emp_id = ($request->emp_id == null) ? '0' : $request->emp_id ;
        $details = array(
            "emp_id" => $emp_id, 
            "username" => $request->username,
            "email" => $request->email,
            "status" => 1,
            "created_by" => Auth::user()->id,
        );

        if ($request->filled('password')) {
            $details["password"] = $password;
        }

        if ($request->group_id) {
            foreach ($request->group_id as $group) {
        
                if (isset($request->group_permission[$group]) && is_array($request->group_permission[$group])) {
                    $permissions = implode(',', $request->group_permission[$group]);
                } else {
                    $permissions = '';
                }
        
                // Define the module data
                $group_data = [
                    "user_id" => $id->id,
                    "group_id" => $group,
                    "permissions" => $permissions,
                    "status" => 1,
                    "created_by" => Auth::user()->id,
                    "updated_by" => Auth::user()->id
                ];
        
                // Check if the record exists
                $existing_group = UserAccessGroup::where('user_id', $id->id)
                                                   ->where('group_id', $group)
                                                   ->first();
        
                if ($existing_group) {
                    // Update the existing record
                    $existing_group->update([
                        "permissions" => $permissions,
                        "status" => 1, // Or any other status logic you need
                        "updated_by" => Auth::user()->id
                    ]);
                } else {
                    // Create a new record
                    UserAccessGroup::create($group_data);
                }
            }
        }

        if ($request->module_id) {
            foreach ($request->module_id as $module) {
        
                if (isset($request->module_permission[$module]) && is_array($request->module_permission[$module])) {
                    $permissions = implode(',', $request->module_permission[$module]);
                } else {
                    $permissions = '';
                }
        
                // Define the module data
                $module_data = [
                    "user_id" => $id->id,
                    "module_id" => $module,
                    "permissions" => $permissions,
                    "status" => 1,
                    "created_by" => Auth::user()->id,
                    "updated_by" => Auth::user()->id
                ];
        
                // Check if the record exists
                $existing_module = UserAccessModule::where('user_id', $id->id)
                                                   ->where('module_id', $module)
                                                   ->first();
        
                if ($existing_module) {
                    // Update the existing record
                    $existing_module->update([
                        "permissions" => $permissions,
                        "status" => 1, // Or any other status logic you need
                        "updated_by" => Auth::user()->id
                    ]);
                } else {
                    // Create a new record
                    UserAccessModule::create($module_data);
                }
            }
        }


        

        $id->update($details);
        return redirect('user-account/user');


    }
}
