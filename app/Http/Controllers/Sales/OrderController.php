<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductItem;
use App\Models\SalesQuotation;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetails;
use App\Models\ProductPackages;
use App\Models\ProductResolution;
use App\Models\ProductBrand;
use App\Models\InvStocks;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        // $data = SalesOrder::orderBy('created_at', 'desc')->get();
        $data = SalesOrder::orderBy('created_at', 'desc')->get();
        return view('sales.order.index')->with(compact('data'));
        // return view('sales.order.index');
    }

    public function create()
    {
        $currentYear = Carbon::now()->year;
        $lastTwoDigits = substr($currentYear, -2);
        $last_order_number = SalesOrder::selectRaw('CAST(order_number AS INTEGER) as numeric_value')->whereYear('created_at', $currentYear)->orderBy('numeric_value', 'desc')->first();
        
        if ($last_order_number) {
            $newOrderNumber = str_pad($last_order_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newOrderNumber = '00001';
        }

        $newControlNo = "O".$lastTwoDigits."-".$newOrderNumber;

        $quotation_numbers = SalesQuotation::orderBy('quote_number', 'asc')->where('status', '1')->get();
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $products = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $clients = Client::orderBy('created_at', 'desc')->where('status', '1')->get();
        $branches = Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get();
        $payment_type = config('constant.payment_type');
        $payment_status = config('constant.payment_status');
        return view('sales.order.create')->with(compact('branches','products','payment_type','payment_status','quotation_numbers','clients','brands','resolutions', 'packages', 'newOrderNumber', 'newControlNo'));
    }

    public function checkItemAvailability($item_id){
        $stocks = InvStocks::where('item_id', $item_id)->get();
        return $available_qty = $stocks->balance_qty; 
    }

    public function store(Request $request){

        // dd($request);
        // items
        $orderedItems = $request->item;
        if($request->item)
        {
            foreach ($orderedItems as $orderedItem) {
                // selected items
                $itemId = $orderedItem['item_id'];
                // qty of items
                $quantity = $orderedItem['item_qty'];
                
                if ($itemId != 0){
                    // search the selected items 
                    $items = InvStocks::where('item_id', $itemId)->get();
    
                    // dd($item, $itemId);
                    foreach ($items as $item) {
                        if ($item->item_id && $item->balance_qty >= $quantity){
                            // dd("enough balance");
                        } else {
                            // Handle insufficient quantity
                            // dd("not enough balance");
                        }
                    }
                    
                }
                
            }
        }
        

        // additional items
        if($request->additionalItem){
            $orderedAdditionalItems = $request->additionalItem;
            foreach ($orderedAdditionalItems as $additionalItem) {
                // selected items
                $itemId = $additionalItem['item_id'];
                // qty of items
                $quantity = $additionalItem['item_qty'];
                
                if ($itemId != 0){
                    // search the selected items 
                    $items = InvStocks::where('item_id', $itemId)->get();

                    // dd($item, $itemId);
                    foreach ($items as $item) {
                        if ($item->item_id && $item->balance_qty >= $quantity){
                            // dd("enough balance");
                        } else {
                            // Handle insufficient quantity
                            // dd("not enough balance");
                        }
                    }
                    
                }
                
            }
        }
        
        

        

        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
        }

        $is_vat = ($request->is_vat == "on") ? "1" : "0";
        // dd($is_vat);
        $details = array(
            "quotation_id" => $request->quotation_id,
            "branch_id" => $request->branch_id,
            "client_id" => $request->client_id,
            "order_control_no" => $request->order_control_no,
            "order_number" => $request->order_number,
            "order_material_cost" => $request->order_material_cost,
            "order_sub_total" => $request->order_sub_total,
            "order_labor_cost" => $request->order_labor_cost,
            "order_other_cost" => $request->order_other_cost,
            "order_discount" => $request->order_discount,
            "order_total_amount" => $request->order_total_amount,
            "is_vat" => $is_vat,
            "vat_percentage" => $request->vat_percent,
            "ewt_percentage" => $request->ewt_percent,
            "vat_amount" => $request->vat_amount,
            "ewt_amount" => $request->ewt_amount,
            "payment_type" => $request->payment_type,
            "payment_status" => $request->payment_status,
            "order_date" => $request->order_date,
            "order_remarks" => $request->order_remarks,
            "order_status" => 1,
            "is_posted" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $insert_order = SalesOrder::create($details);

        // save to order_details table
        if($request->item)
        {
            foreach ($request->item as $item) {
            
                $order_details = array(
                    "order_id" => $insert_order->id,
                    "item_id" => $item["item_id"], 
                    "package_id" => $item["package_id"], 
                    "is_package" => $item["is_package"], 
                    "is_additional" => $item["is_additional"], 
                    "order_qty" => $item["item_qty"], 
                    "order_amount" => $item["order_amount"], 
                    "order_total_amount" => $item["order_total_amount"],
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                SalesOrderDetails::create($order_details);
            }
        }
        

        if($request->additionalItem){
            foreach ($request->additionalItem as $item) {
            
                $additional_items = array(
                    "order_id" => $insert_order->id,
                    "item_id" => $item["item_id"], 
                    "package_id" => $item["package_id"], 
                    "is_package" => $item["is_package"], 
                    "is_additional" => $item["is_additional"], 
                    "order_qty" => $item["item_qty"], 
                    "order_amount" => $item["order_amount"], 
                    "order_total_amount" => $item["order_total_amount"],
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                SalesOrderDetails::create($additional_items);
            }
        }
        

        // update inventory deduction
        if($is_posted == 1)
        {
            foreach ($request->item as $item) {
                $item_qty = $item["item_qty"];
                $item_id = $item["item_id"];
                DB::table('inv_stocks')->where('item_id', $item_id)->update(
                    ['balance_qty' => DB::raw('balance_qty - ' . $item_qty),
                    'ordered_qty' => DB::raw('ordered_qty + ' . $item_qty)
                    ]
                );
            }

            if($request->additionalItem){
                foreach ($request->additionalItem as $item) {
                    $item_qty = $item["item_qty"];
                    $item_id = $item["item_id"];
                    DB::table('inv_stocks')->where('item_id', $item_id)->update(
                        ['balance_qty' => DB::raw('balance_qty - ' . $item_qty),
                        'ordered_qty' => DB::raw('ordered_qty + ' . $item_qty)
                        ]
                    );
                }
                
            }
        }

        if($is_posted == 1 && $request->payment_status == 1) // if already posted and payment status = paid
        {
            foreach ($request->item as $item) {
                $item_qty = $item["item_qty"];
                $item_id = $item["item_id"];

                DB::table('inv_stocks')->where('item_id', $item_id)->update(
                    ['ordered_qty' => DB::raw('ordered_qty - ' . $item_qty),
                    'sold_qty' => DB::raw('sold_qty + ' . $item_qty)
                    ]
                );
            }

            if($request->additionalItem){
                foreach ($request->additionalItem as $item) {
                    $item_qty = $item["item_qty"];
                    $item_id = $item["item_id"];
    
                    DB::table('inv_stocks')->where('item_id', $item_id)->update(
                        ['ordered_qty' => DB::raw('ordered_qty - ' . $item_qty),
                        'sold_qty' => DB::raw('sold_qty + ' . $item_qty)
                        ]
                    );
                }
            }
        }


        return back()->with('message','Data has been saved successfully');
    }

    public function showOrderData($id)
    {
        $order = SalesOrder::with('order_details','client', 'order_details.item', 'employee', 'order_details.item.uom', 'order_details.package')
        ->find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        // Access the details through the relationship
        $orderDetails = $order->order_details;
        // pass data to front end
        return response()->json(['order' => $order, 'orderDetails' => $orderDetails]);
    }

    public function edit($id){
        $sales_order = SalesOrder::find($id);
        // $quotation_details = SalesQuotationDetails::find($quotation->id);
        // dd($quotation_details);
        $quotation_numbers = SalesQuotation::orderBy('quote_number', 'asc')->where('status', '1')->get();
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $products = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $clients = Client::orderBy('created_at', 'desc')->where('status', '1')->get();
        $order_details = SalesOrderDetails::where('order_id', $id)->where('is_additional', 0)->get();
        $order_additional = SalesOrderDetails::where('order_id', $id)->where('is_additional', 1)->get();
        $branches = Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get();
        $payment_type = config('constant.payment_type');
        $payment_status = config('constant.payment_status');

        // dd($payment_type);
        return view('sales.order.edit')->with(compact('order_details','order_additional','sales_order','products','payment_type','payment_status','quotation_numbers','clients','brands','resolutions', 'packages','branches'));
    }

    public function update(Request $request, SalesOrder $id, SalesOrderDetails $details_id){
        
        // dd($request->item, $request->additionalItem);
        
        $orderedItems = $request->item;
        if($request->item)
        {
            foreach ($orderedItems as $orderedItem) {
                // selected items
                $itemId = $orderedItem['item_id'];
                // qty of items
                $quantity = $orderedItem['item_qty'];
                
                if ($itemId != 0){
                    // search the selected items 
                    $items = InvStocks::where('item_id', $itemId)->get();
    
                    // dd($item, $itemId);
                    foreach ($items as $item) {
                        if ($item->item_id && $item->balance_qty >= $quantity){
                            // dd("enough balance");
                        } else {
                            // Handle insufficient quantity
                            // dd("not enough balance");
                        }
                    }
                    
                }
                
            }
        }
        

        // additional items
        if($request->additionalItem){
            $orderedAdditionalItems = $request->additionalItem;
            foreach ($orderedAdditionalItems as $additionalItem) {
                // selected items
                $itemId = $additionalItem['item_id'];
                // qty of items
                $quantity = $additionalItem['item_qty'];
                
                if ($itemId != 0){
                    // search the selected items 
                    $items = InvStocks::where('item_id', $itemId)->get();

                    // dd($item, $itemId);
                    foreach ($items as $item) {
                        if ($item->item_id && $item->balance_qty >= $quantity){
                            // dd("enough balance");
                        } else {
                            // Handle insufficient quantity
                            // dd("not enough balance");
                        }
                    }
                    
                }
                
            }
        }
        
        

        

        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
        }

        $is_vat = ($request->is_vat == "on") ? "1" : "0";
        // dd($is_vat);
        $details = array(
            "quotation_id" => $request->quotation_id,
            "branch_id" => $request->branch_id,
            "client_id" => $request->client_id,
            "order_control_no" => $request->order_control_no,
            "order_material_cost" => $request->order_material_cost,
            "order_sub_total" => $request->order_sub_total,
            "order_labor_cost" => $request->order_labor_cost,
            "order_other_cost" => $request->order_other_cost,
            "order_discount" => $request->order_discount,
            "order_total_amount" => $request->order_total_amount,
            "is_vat" => $is_vat,
            "vat_percentage" => $request->vat_percent,
            "ewt_percentage" => $request->ewt_percent,
            "vat_amount" => $request->vat_amount,
            "ewt_amount" => $request->ewt_amount,
            "payment_type" => $request->payment_type,
            "payment_status" => $request->payment_status,
            "order_date" => $request->order_date,
            "order_remarks" => $request->order_remarks,
            "order_status" => 1,
            "is_posted" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $id->update($details);

        // delete before saving to order_details table
        
        if($request->item)
        {
            SalesOrderDetails::where('order_id', $id->id)->where('is_additional', 0)->delete();
            foreach ($request->item as $item) {
            
                $order_details = array(
                    "order_id" => $id->id,
                    "item_id" => $item["item_id"], 
                    "package_id" => $item["package_id"], 
                    "is_package" => $item["is_package"], 
                    "is_additional" => $item["is_additional"], 
                    "order_qty" => $item["item_qty"], 
                    "order_amount" => $item["order_amount"], 
                    "order_total_amount" => $item["order_total_amount"],
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                SalesOrderDetails::create($order_details);
            }
        }
        
        if($request->additionalItem){
            SalesOrderDetails::where('order_id', $id->id)->where('is_additional', 1)->delete();
            foreach ($request->additionalItem as $item) {
            
                $additional_items = array(
                    "order_id" => $id->id,
                    "item_id" => $item["item_id"], 
                    "package_id" => $item["package_id"], 
                    "is_package" => $item["is_package"], 
                    "is_additional" => $item["is_additional"], 
                    "order_qty" => $item["item_qty"], 
                    "order_amount" => $item["order_amount"], 
                    "order_total_amount" => $item["order_total_amount"],
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                SalesOrderDetails::create($additional_items);
            }
        }
        

        // update inventory deduction
        if($is_posted == 1)
        {
            foreach ($request->item as $item) {
                $item_qty = $item["item_qty"];
                $item_id = $item["item_id"];
                DB::table('inv_stocks')->where('item_id', $item_id)->update(
                    ['balance_qty' => DB::raw('balance_qty - ' . $item_qty),
                    'ordered_qty' => DB::raw('ordered_qty + ' . $item_qty)
                    ]
                );
            }

            if($request->additionalItem){
                foreach ($request->additionalItem as $item) {
                    $item_qty = $item["item_qty"];
                    $item_id = $item["item_id"];
                    DB::table('inv_stocks')->where('item_id', $item_id)->update(
                        ['balance_qty' => DB::raw('balance_qty - ' . $item_qty),
                        'ordered_qty' => DB::raw('ordered_qty + ' . $item_qty)
                        ]
                    );
                }
                
            }
        }

        if($is_posted == 1 && $request->payment_status == 1) // if already posted and payment status = paid
        {
            foreach ($request->item as $item) {
                $item_qty = $item["item_qty"];
                $item_id = $item["item_id"];

                DB::table('inv_stocks')->where('item_id', $item_id)->update(
                    ['ordered_qty' => DB::raw('ordered_qty - ' . $item_qty),
                    'sold_qty' => DB::raw('sold_qty + ' . $item_qty)
                    ]
                );
            }

            if($request->additionalItem){
                foreach ($request->additionalItem as $item) {
                    $item_qty = $item["item_qty"];
                    $item_id = $item["item_id"];
    
                    DB::table('inv_stocks')->where('item_id', $item_id)->update(
                        ['ordered_qty' => DB::raw('ordered_qty - ' . $item_qty),
                        'sold_qty' => DB::raw('sold_qty + ' . $item_qty)
                        ]
                    );
                }
            }
        }


        return back()->with('message','Data has been saved successfully');
    }
}
