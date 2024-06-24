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
        $data = Group::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('group.index')->with(compact('data'));
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(GroupStoreRequest $request)
    {
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
        $data = Group::findOrFail($id);
        return view('group.edit', ['group' => $data]);
    }

    public function update(GroupStoreRequest $request, Group $id)
    {
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

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/component/group/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }

    public function delete(Group $group, $id)
    {
        $current_status = Group::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $group->where('id', $id)->update($update);
        return redirect('/component/group'); // kulang yung slug
    }
}
