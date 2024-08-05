<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\UserRole;
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
use App\Helpers\PermissionHelper;

class UserController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user', 'Read');
        $buttons = PermissionHelper::getButtonStates('/user-account/user');
        $data = User::orderBy('created_at', 'desc')->get();

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('user.index')->with(compact('data','buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user', 'Create');
        $modules = Module::select('id','module_name', 'group_id')->where('status', 1)->get();
        $employees = Employee::select('id','emp_full_name')->where('status', 1)->get();
        $roles = UserRole::select('id','user_role')->where('status', 1)->get();
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        $permissions = Permission::select('id','name')->get();
        $data_access = config('constant.data_access');
        return view('user.create')->with(compact('employees','groups','modules','permissions','roles', 'data_access'));
    }

    public function store(UserStoreRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user', 'Create');
        $validated = $request->validated();
        $emp_id = ($request->emp_id == null) ? '0' : $request->emp_id ;
        $details = array(
            "emp_id" => $emp_id, 
            "role_id" => $request->user_role, 
            "data_access" => $request->data_access,
            "username" => null,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "status" => 1,
            "created_by" => Auth::user()->id,
        );

        User::create($details);
        return redirect('user-account/user')->with('message','Data has been saved successfully');
    }

    
    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user', 'Read');
        $buttons = PermissionHelper::getButtonStates('/user-account/user');
        $data = User::findOrFail($id);
        $modules = Module::select('id','module_name', 'group_id')->where('status', 1)->get();
        $employees = Employee::select('id','emp_full_name')->where('status', 1)->get();
        $roles = UserRole::select('id','user_role')->where('status', 1)->get();
        $groups = Group::select('id','group_name')->where('status', 1)->get();
        $permissions = Permission::select('id','name')->get();
        $data_access = config('constant.data_access');

        // Fetch user access groups and modules
        
        $userAccessGroups = UserAccessGroup::where('user_id', $id)->get();
        $userAccessModules = UserAccessModule::where('user_id', $id)->get();
        // dd($userAccessGroups);
        return view('user.edit')->with(compact('data','employees','groups','modules','permissions','data_access', 'userAccessGroups', 'userAccessModules', 'roles', 'buttons'));
    }

    public function update(UserStoreRequest $request, User $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user', 'Update');
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
            "role_id" => $request->user_role, 
            "data_access" => $request->data_access,
            "email" => $request->email,
            "status" => 1,
            "updated_by" => Auth::user()->id,
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

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user', 'Remove');
        $user = User::find($id);

        if ($user) {
            $new_status = $user->status == 1 ? 0 : 1;
            $user->status = $new_status;

            if ($user->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
}
