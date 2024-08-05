<?php

namespace App\Http\Controllers\Website;

use App\Http\Requests\QuotationRequest;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

use App\Models\SalesQuotation;
use App\Models\SalesQuotationDetails;
use App\Models\ProductItem;
use App\Models\ProductBrand;
use App\Models\Client;
use App\Models\ProductResolution;
use App\Models\ProductPackages;
use App\Models\Branch;

class QuotationController extends Controller
{
    public function index()
    {
        $data = SalesQuotation::orderBy('created_at', 'desc')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $branches = Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();

        return view('website.quotation')->with(compact('brands','resolutions', 'branches'));
    }

    public function store(QuotationRequest $request)
    {
        $currentYear = Carbon::now()->year;
        
        $last_quote_number = SalesQuotation::selectRaw('CAST(quote_number AS INTEGER) as numeric_value')->whereYear('created_at', $currentYear)->orderBy('numeric_value', 'desc')->first();
        
        if ($last_quote_number) {
            $newQuoteNumber = str_pad($last_quote_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newQuoteNumber = '00001';
        }

        $newControlNo = "Q".$currentYear."-".$newQuoteNumber;

        $validated = $request->validated();

        $details = [
            "branch_id" => $request->branch_id,
            "quote_name" => $request->quote_name,
            "quote_email" => $request->quote_email,
            "quote_contact_no" => $request->quote_contact_no,
            "quote_address" => $request->quote_address,
            "quote_number" => $newQuoteNumber,
            "quote_date" => $request->quote_date,
            "quote_control_number" => $newControlNo,
            "brand_id" => $request->brand_id,
            "resolution_desc" => $request->resolution_desc,
            "channel_id" => $request->channel_id,
            "indoor_cam_no" => $request->indoor_cam_no,
            "outdoor_cam_no" => $request->outdoor_cam_no,
            "remarks" => $request->remarks,
            "created_by" => 0, // 0 na lang muna to
            "updated_by" => 0,
            "status" => 1,
            "is_posted" => 0,
            "is_request" => 1,
        ];

        SalesQuotation::create($details);
        return redirect()->route('website-quotation.index');
    }
}