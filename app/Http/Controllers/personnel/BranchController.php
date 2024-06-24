<?php

namespace App\Http\Controllers\Personnel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BranchStoreRequest;
use DataTables;
class BranchController extends Controller
{
    public function index()
    {
        // if(\request()->ajax()){
        //     $data = Product::latest()->get();
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // return view('products.index');

        $data = Branch::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('branch.index')->with(compact('data'));
    }

    public function create()
    {
        return view('branch.create');
    }

    public function store(BranchStoreRequest $request)
    {
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
        // return redirect('/personnel/branch');

    }

    public function edit($id)
    {
        $data = Branch::findOrFail($id);
        return view('branch.edit', ['branch' => $data]);
    }

    public function update(BranchStoreRequest $request, Branch $id)
    {
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

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/personnel/branch/delete/".$id;
        return view('components.remove-form', compact('action'));
    }

    public function delete(Branch $branch, $id)
    {
        $current_status = Branch::find($id, ['branch_status']);
        $new_status = ($current_status->branch_status == "1") ? "0" : "1";
        $update = array(
            "branch_status" => $new_status,
        );
        $branch->where('id', $id)->update($update);
        return redirect('/personnel/branch');
    }
}





