<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesQuotation;
use App\Models\SalesQuotationDetails;
use App\Models\ProductItem;
use App\Models\ProductBrand;
use App\Models\Client;
use App\Models\ProductResolution;
use App\Models\ProductPackages;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\PermissionHelper;
use Mail;
use Auth;

class QuotationController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/sales/quotation', 'Read');	
        $buttons = PermissionHelper::getButtonStates('/sales/quotation');
        $data = SalesQuotation::orderBy('created_at', 'desc')->get();

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('sales.quotation.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/sales/quotation', 'Create');

        $products = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $clients = Client::orderBy('created_at', 'desc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $payment_type = config('constant.payment_type');
        $payment_status = config('constant.payment_status');
        $branches = Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get();
        return view('sales.quotation.create')->with(compact('products','clients','brands','resolutions', 'packages', 'payment_type', 'payment_status', 'branches'));
    }

    public function store(Request $request){

        $is_authorized = PermissionHelper::checkAuthorization('/sales/quotation', 'Create');
        $validatedData = $request->validate([
            'quote_date' => 'required',
            'branch_id' => 'required',
            'client_id' => 'required',
            'labor_cost' => 'required',
            'other_cost' => 'required',
            'discount_cost' => 'required',
            'item' => 'required',
            
        ], [
            'quote_date.required' => 'The Date field is required.',
            'branch_id.required' => 'The Branch field is required.',
            'labor_cost.required' => 'The Labor Cost field is required.',
            'client_id.required' => 'The Client field is required.',
            'other_cost.required' => 'The Other Cost field is required.',
            'discount_cost.required' => 'The Discount field is required.',
            'item.required' => 'Please select an Item.',
        ]);

        $currentYear = Carbon::now()->year;
        $lastTwoDigits = substr($currentYear, -2);
        $last_quote_number = SalesQuotation::selectRaw('CAST(quote_number AS INTEGER) as numeric_value')->whereYear('created_at', $currentYear)->orderBy('numeric_value', 'desc')->first();
        
        if ($last_quote_number) {
            $newQuoteNumber = str_pad($last_quote_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newQuoteNumber = '00001';
        }

        $newControlNo = "RFQ".$lastTwoDigits."-".$newQuoteNumber;

        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
        }

        $isChecked = $request->has('is_vat') ? 1 : 0;

        $details = array(
            "quote_number" => $newQuoteNumber,
            "quote_control_number" => $newControlNo,
            "is_request" => 0,
            "branch_id" => $request->branch_id,
            "brand_id" => $request->brand_id,
            "installation_type" => $request->installation_type,
            "resolution_id" => $request->resolution_id,
            "channel_id" => $request->channel_id,
            "indoor_cam_no" => $request->indoor_cam_no,
            "outdoor_cam_no" => $request->outdoor_cam_no,
            "quote_date" => $request->quote_date,
            "quote_id" => $request->quote_id,
            "client_id" => $request->client_id, 
            "quote_name" => $request->quote_name,
            "quote_email" => $request->quote_email,
            "quote_contact_no" => $request->quote_contact_no,
            "quote_address" => $request->quote_address,
            "quote_material_cost" => $request->material_cost,
            "quote_labor_cost" => $request->labor_cost,
            "quote_other_cost" => $request->other_cost,
            "quote_sub_total" => $request->sub_total_cost,
            "quote_discount" => $request->discount_cost,
            "is_vat" => $isChecked,
            "vat_percentage" => $request->vat_percent,
            "ewt_percentage" => $request->ewt_percent,
            "vat_amount" => $request->vat_amount,
            "ewt_amount" => $request->ewt_amount,
            "total_amount" => $request->total_amount,
            "remarks" => $request->remarks,
            "status" => 1,
            "is_posted" => $is_posted,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $insert_quotation = SalesQuotation::create($details);

        // dd($request->item);
        foreach ($request->item as $item) {
            
            $quotation_details = array(
                "quotation_id" => $insert_quotation->id,
                "item_id" => $item["item_id"], 
                "package_id" => $item["package_id"], 
                "is_package" => $item["is_package"], 
                "quote_qty" => $item["item_qty"], 
                "quote_amount" => $item["order_amount"], 
                "quote_total_amount" => $item["order_total_amount"], 
                "status" => 1,
                "created_by" => Auth::user()->id,
                "updated_by" => 0,
            );
            SalesQuotationDetails::create($quotation_details);
        }
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id){
        
        $is_authorized = PermissionHelper::checkAuthorization('/sales/quotation', 'Read');
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $products = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        // $clients = Client::orderBy('created_at', 'desc')->where('status', '1')->get();
        // $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        // $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();

        $buttons = PermissionHelper::getButtonStates('/sales/quotation');
        $data = [
            'quotation' => SalesQuotation::find($id),
            'quotation_details' => SalesQuotationDetails::where('quotation_id', $id)->get(),
            'clients' => Client::orderBy('created_at', 'desc')->where('status', '1')->get(),
            'brands' => ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get(),
            'resolutions' => ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get(),
            'branches' => Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get(),
        ];
        // dd($data['branches']);
        return view('sales.quotation.edit')->with(compact('data', 'packages', 'products', 'buttons'));
    }

    public function update(Request $request, SalesQuotation $id, SalesQuotationDetails $details_id){

        $is_authorized = PermissionHelper::checkAuthorization('/sales/quotation', 'Update');
        $validatedData = $request->validate([
            'quote_date' => 'required',
            'branch_id' => 'required',
            'client_id' => 'required',
            'labor_cost' => 'required',
            'other_cost' => 'required',
            'discount_cost' => 'required',
            'item' => 'required',
            
        ], [
            'quote_date.required' => 'The Date field is required.',
            'branch_id.required' => 'The Branch field is required.',
            'labor_cost.required' => 'The Labor Cost field is required.',
            'client_id.required' => 'The Client field is required.',
            'other_cost.required' => 'The Other Cost field is required.',
            'discount_cost.required' => 'The Discount field is required.',
            'item.required' => 'Please select an Item.',
        ]);

        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
            $quotation = SalesQuotation::where('id', $id->id)->first();
            // dd($quotation);
            $quotation_items = SalesQuotationDetails::where('quotation_id', $id->id)->get();

            $data = array(
                            'quotation' => $quotation,
                            'quotation_details' => $quotation_items,
                        );
            Mail::send('mail.quotation', $data, function($message) use ($request) {
            $message->to($request->quote_email, $request->quote_name)->subject
                ('Citi Security Quotation');
            $message->from('citisecurity@test.com','Citi Security');

        });
        }

        $isChecked = $request->has('is_vat') ? 1 : 0;

        $details = array(
            "quote_number" => $request->quote_number,
            "quote_control_number" => $request->quote_control_number,
            "is_request" => 0,
            "brand_id" => $request->brand_id,
            "installation_type" => $request->installation_type,
            "resolution_id" => $request->resolution_id,
            "channel_id" => $request->channel_id,
            "indoor_cam_no" => $request->indoor_cam_no,
            "outdoor_cam_no" => $request->outdoor_cam_no,
            "quote_date" => $request->quote_date,
            "quote_id" => $request->quote_id,
            "client_id" => $request->client_id, 
            "quote_name" => $request->quote_name,
            "quote_email" => $request->quote_email,
            "quote_contact_no" => $request->quote_contact_no,
            "quote_address" => $request->quote_address,
            "quote_material_cost" => $request->material_cost,
            "quote_labor_cost" => $request->labor_cost,
            "quote_other_cost" => $request->other_cost,
            "quote_sub_total" => $request->sub_total_cost,
            "quote_discount" => $request->discount_cost,
            "is_vat" => $isChecked,
            "vat_percentage" => $request->vat_percent,
            "ewt_percentage" => $request->ewt_percent,
            "vat_amount" => $request->vat_amount,
            "ewt_amount" => $request->ewt_amount,
            "total_amount" => $request->total_amount,
            "remarks" => $request->remarks,
            "status" => 1,
            "is_posted" => $is_posted,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $id->update($details);

        // dd($request->item);
        if ($request->item){
            SalesQuotationDetails::where('quotation_id', $id->id)
                        ->delete();
            foreach ($request->item as $item) {
            
                $quotation_details = array(
                    "quotation_id" => $id->id,
                    "item_id" => $item["item_id"], 
                    "package_id" => $item["package_id"], 
                    "is_package" => $item["is_package"], 
                    "quote_qty" => $item["item_qty"], 
                    "quote_amount" => $item["order_amount"], 
                    "quote_total_amount" => $item["order_total_amount"], 
                    "status" => 1,
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                $details_id->create($quotation_details);
            }
        }
        

        

        return redirect('/sales/quotation');
    }

    public function showItems()
    {
        $products = ProductItem::select('*')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('sales.quotation.item-list-modal')->with(compact('products'));
    }

    public function showPackages()
    {
        $packages = ProductPackages::select('*')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('sales.quotation.package-list-modal')->with(compact('packages'));
    }

    public function showClientDetails($id)
    {   
        $client = Client::find($id);
        return response()->json([
            'data' => $client
        ]);
    }

    public function showQuotationData($id)
    {
        // $quotation = DB::table('sales_quotations')
        //     ->where('sales_quotations.id', $id)
        //     // ->join('sales_quotation_details', 'sales_quotation_details.quotation_id', 'sales_quotations.id')
        //     ->join('clients', 'sales_quotations.client_id', 'clients.id')
        //     ->select('sales_quotations.*', 'clients.*')
        //     // ->with('quotation_details','client', 'quotation_details.item', 'quotation_details.item.uom', 'quotation_details.package')
        //     ->get();

        // $quotationDetails = DB::table('sales_quotation_details')
        //     ->where('sales_quotation_details.quotation_id', $id)
        //     // ->join('sales_quotation_details', 'sales_quotation_details.quotation_id', 'sales_quotations.id')
        //     ->join('packaged_items', 'sales_quotation_details.item_id', 'packaged_items.id')
        //     ->join('product_items', 'sales_quotation_details.item_id', 'product_items.id')
        //     ->join('unit_of_measurements', 'product_items.uom_id', 'unit_of_measurements.id')
        //     ->select('sales_quotation_details.*', 'product_items.*', 'unit_of_measurements.*')
        //     // ->with('quotation_details','client', 'quotation_details.item', 'quotation_details.item.uom', 'quotation_details.package')
        //     ->get();
        
        // ->whereHas('quotation_details', function ($query) {
        //     $id = 1;
        //     $query->where('quotation_id', $id); // Replace 'column_name' with the actual column name
        // })
        $quotation = SalesQuotation::with('quotation_details','client', 'quotation_details.item', 'quotation_details.item.uom', 'quotation_details.package')
        ->find($id);
        if (!$quotation) {
            return response()->json(['error' => 'Quotation not found'], 404);
        }
        // Access the details through the relationship
        $quotationDetails = $quotation->quotation_details;
        // pass data to front end
        return response()->json(['quotation' => $quotation, 'quotationDetails' => $quotationDetails]);
    }

    public function sendEmail(SalesQuotation $id, Request $request)
    {
        $quotation = SalesQuotation::where('id', $id->id)->first();
        // dd($quotation);
        $quotation_items = SalesQuotationDetails::where('quotation_id', $id->id)->get();

        $data = array(
                        'quotation' => $quotation,
                        'quotation_details' => $quotation_items,
                    );
        Mail::send('mail.quotation', $data, function($message) use ($id) {
            $message->to($id->quote_email, $id->quote_name)->subject
                ('Citi Security Quotation');
            $message->from('citisecurity@test.com','Citi Security');
        });

        return back()->with('message','Email has been sent successfully');
    }
    
    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/sales/quotation', 'Remove');
        $quotation = SalesQuotation::find($id);

        if ($quotation) {
            $new_status = $quotation->status == 1 ? 0 : 1;
            $quotation->status = $new_status;

            if ($quotation->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
}
