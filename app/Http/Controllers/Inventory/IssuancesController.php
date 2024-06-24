<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Employee;
use App\Models\ProductItem;
use App\Models\ProductPackages;
use App\Models\ProductResolution;
use App\Models\ProductBrand;
use App\Models\InvStocks;
use App\Models\InvIssuance;
use App\Models\InvIssuanceItems;
use App\Models\EmployeeInventory;

class IssuancesController extends Controller
{
    public function index() {
        $data = InvIssuance::orderBy('created_at', 'desc')->where('status', '1')->get();
        return view('inventory.issuances.index')->with(compact('data'));
        // return view('sales.order.index')->with(compact('data'));
    }

    public function create() {
        $employees = Employee::orderBy('emp_first_name', 'asc')->where('status', '1')->get();
        $issuances = InvIssuance::orderBy('id', 'asc')->where('status', '1')->get();
        
        // items
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $products = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $payment_type = config('constant.payment_type');
        return view('inventory.issuances.create')->with(compact('issuances', 'employees', 'products', 'brands','resolutions', 'packages',));
    }

    public function store(Request $request){

        // check inventory

        $selectedItems = $request->item;
        // dd($selectedItems);
        foreach ($selectedItems as $selectedItem) {
            // selected items
            $itemId = $selectedItem['item_id'];
            // qty of items
            $quantity = $selectedItem['issued_qty'];
            
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


        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
        } 

        $currentYear = Carbon::now()->year;
        $lastTwoDigits = substr($currentYear, -2);
        $last_issuance_number = InvIssuance::selectRaw('CAST(issuance_number AS INTEGER) as numeric_value')->whereYear('created_at', $currentYear)->orderBy('numeric_value', 'desc')->first();
        
        if ($last_issuance_number) {
            $newIssuanceNumber = str_pad($last_issuance_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newIssuanceNumber = '00001';
        }

        $newControlNo = "IS".$lastTwoDigits."-".$newIssuanceNumber;

        

        if ($is_posted == 1){

        }

        $details = array(
            "issuance_type" => 1,
            "issuance_date" => $request->issuance_date,
            "issuance_number" => $newIssuanceNumber,
            "issuance_control_no" => $newControlNo,
            "issued_by" => Auth::user()->id,
            "received_by" => $request->received_by,
            "remarks" => $request->remarks,
            "is_posted" => $is_posted,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $insert_issuance = InvIssuance::create($details);

        foreach ($request->item as $item) {
            
            $order_details = array(
                "issuance_id" => $insert_issuance->id,
                "item_id" => $item["item_id"], 
                "issued_qty" => $item["issued_qty"], 
                "status" => 1,
                "created_by" => Auth::user()->id,
                "updated_by" => 0,
            );
            InvIssuanceItems::create($order_details);
        }

        // update inventory deduction
        if($is_posted == 1)
        {
            foreach ($request->item as $item) {
                $item_qty = $item["issued_qty"];
                $item_id = $item["item_id"];
                DB::table('inv_stocks')->where('item_id', $item_id)->update(
                    ['balance_qty' => DB::raw('balance_qty - ' . $item_qty)]
                );
            }

            foreach ($request->item as $item) {
                $item_qty = $item["issued_qty"];
            
                DB::table('employee_inventory')->updateOrInsert(
                    ['item_id' => $item["item_id"], 'emp_id' => $request->received_by],

                    ['balance_qty' => DB::raw('balance_qty + '. $item_qty ),
                     'issued_qty' => DB::raw('issued_qty + ' . $item_qty),
                     'emp_id' => $request->received_by,
                    ]
                );
            }

            // $emp_inventory_data = array(
            //     "emp_id" => $request->received_by,
            //     "item_id" => $request->item_id,
            //     "issued_qty" => $item["issued_qty"],
            //     "returned_qty" => 0,
            //     "balance_qty" => 0,
            // );
            // $insert_emp_inv = InvIssuance::create($emp_inventory_data);
        }

        return back()->with('message','Data has been saved successfully');
    }
}
