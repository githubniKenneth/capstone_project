<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Group;
use App\Http\Requests\GroupStoreRequest;

class GroupController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/group', 'Read');
        $data = Group::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('group.index')->with(compact('data'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/group', 'Create');
        return view('group.create');
    }

    public function store(GroupStoreRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/group', 'Create');
        $validated = $request->validated();
        
        $details = array(
            "group_name" => $request->group_name, 
            "group_code" => $request->group_code,
            "group_icon" => $request->group_icon,
            "group_description" => $request->group_description,
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        Group::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/group', 'Read');
        $data = Group::findOrFail($id);
        return view('group.edit', ['group' => $data]);
    }

    public function update(GroupStoreRequest $request, Group $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/group', 'Update');
        $validated = $request->validated();
        $details = array(
            "group_name" => $request->group_name, 
            "group_code" => $request->group_code,
            "group_icon" => $request->group_icon,
            "group_description" => $request->group_description,
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/component/group', 'Remove');
        $employee = Group::find($id);

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
