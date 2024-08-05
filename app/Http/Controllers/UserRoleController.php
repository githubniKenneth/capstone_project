<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\Group;
use App\Models\Module;
use App\Models\DashboardAccess;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserRoleRequest;
use App\Http\Controllers\AnotherController;
use Auth;
use App\Helpers\PermissionHelper;

class UserRoleController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user-role', 'Read');
        $buttons = PermissionHelper::getButtonStates('/user-account/user-role');
        $data = UserRole::orderBy('created_at', 'desc')->get();

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('user-role.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user-role', 'Create');
        return view('user-role.create');
    }

    public function store(UserRoleRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user-role', 'Create');
        $validated = $request->validated();
        $details = array(
            "user_role" => $request->user_role, 
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        );

        UserRole::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user-role', 'Read');
        $buttons = PermissionHelper::getButtonStates('/user-account/user-role');
        $current_access = DashboardAccess::where('role_id', $id)->select('dashboard_id')->get()->pluck('dashboard_id')->toArray();
        // dd($current_access);
        $data = UserRole::findOrFail($id);
        $dashboard = config('constant.dashboard');
        return view('user-role.edit')->with(compact('data', 'dashboard','current_access', 'buttons'));
    }

    public function update(UserRoleRequest $request, UserRole $id)
    {

        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user-role', 'Update');
        // dd($current_access);
        $validated = $request->validated();

        $details = array(
            "user_role" => $request->user_role, 
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => Auth::user()->id,
        );
        $id->update($details);


        if($request->dashboard){

            DashboardAccess::where('role_id', $id->id)->delete();
            foreach ($request->dashboard as $dashboard) {
                // dd($dashboard);
                $dashboard_access = array(
                    "role_id" => $id->id,
                    "dashboard_id" => $dashboard["dashboard_id"], 
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                DashboardAccess::create($dashboard_access);
            }
        }
        

        
        return back()->with('message','Data has been saved successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/user-account/user-role', 'Remove');
        $role = UserRole::find($id);

        if ($role) {
            $new_status = $role->status == 1 ? 0 : 1;
            $role->status = $new_status;

            if ($role->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
}
