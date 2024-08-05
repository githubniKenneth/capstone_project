<?php

namespace App\Http\Controllers\Personnel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BranchStoreRequest;
use DataTables;
use App\Helpers\PermissionHelper;
use Illuminate\Auth\Access\AuthorizationException;

class BranchController extends Controller
{
    public function index()
    {   
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/branch', 'Read');
        $buttons = PermissionHelper::getButtonStates('/personnel/branch');
        $data = Branch::orderBy('created_at', 'desc')->get();

        foreach ($data as $status){
            $status->status_color = $status->branch_status == 1 ? 'status-active' : 'status-inactive';
        }

        return view('branch.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/branch', 'Create');
        return view('branch.create');
    }

    public function store(BranchStoreRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/branch', 'Create');
        $validated = $request->validated();
        $full_address = $request->branch_lot_no.' '.$request->branch_street.' '.$request->branch_brgy.' '.$request->branch_city;

        $details = array(
            "branch_name" => $request->branch_name, 
            "branch_lot_no" => $request->branch_lot_no,
            "branch_street" => $request->branch_street,
            "branch_brgy" => $request->branch_brgy,
            "branch_city" => $request->branch_city,
            "full_address" => $full_address,
            "branch_tele_no" => $request->branch_tele_no,
            "branch_phone_no" => $request->branch_phone_no,
            "branch_email" => $request->branch_email,
            "branch_status" => $request->branch_status,
            "created_by" => 1,
            "updated_by" => 1,
        );
        Branch::create($details);
        return back()->with('message','Data has been saved successfully');

    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/branch', 'Read');
        $buttons = PermissionHelper::getButtonStates('/personnel/branch');
        $data = Branch::findOrFail($id);
        return view('branch.edit', ['branch' => $data, 'buttons' => $buttons]);
    }

    public function update(BranchStoreRequest $request, Branch $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/branch', 'Update');
        $validated = $request->validated();
        $details = array(
            "branch_name" => $request->branch_name, 
            "branch_lot_no" => $request->branch_lot_no,
            "branch_street" => $request->branch_street,
            "branch_brgy" => $request->branch_brgy,
            "branch_city" => $request->branch_city,
            "full_address" => $request->full_address,
            "branch_tele_no" => $request->branch_tele_no,
            "branch_phone_no" => $request->branch_phone_no,
            "branch_email" => $request->branch_email,
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/personnel/branch', 'Remove');
        $branch = Branch::find($id);

        if ($branch) {
            $new_status = $branch->branch_status == 1 ? 0 : 1;
            $branch->branch_status = $new_status;

            if ($branch->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
}





