<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\ContactRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Branch;

use App\Http\Requests\BranchStoreRequest;

class ContactController extends Controller
{
    public function index()
    {
        $data = Branch::orderBy('created_at', 'desc')->get();
        // dd($data);
        return view('website.contact')->with(compact('data'));
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
        return redirect('/personnel/branch');
    }
}
