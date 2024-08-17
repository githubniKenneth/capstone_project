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
use App\Models\Branch;
use App\Helpers\InventoryHelper;
use App\Helpers\PermissionHelper;

class IssuancesController extends Controller
{
    public function index() {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/issuances', 'Read');
        $buttons = PermissionHelper::getButtonStates('/inventory/issuances');
        $data_access = Auth::user()->data_access;
        $emp_id = Auth::user()->emp_id; //employee id of the user

        if ($data_access == 1)
        {
            $data = InvIssuance::orderBy('created_at', 'desc')->get();
        }
        elseif ($data_access == 3)
        {
            $data = InvIssuance::orderBy('created_at', 'desc')->where('received_by', $emp_id)->get();
        }

        // foreach ($data as $status){
        //     $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        // }

        foreach ($data as $status){
            switch($status->status){
                case 0:
                    $status->status_color = 'status-inactive';
                    $status->status = 'Inactive';
                    break;
                case 1:
                    $status->status_color = 'status-active';
                    $status->status = 'Active';
                    break;
                case 2:
                    $status->status_color = 'status-cancelled';
                    $status->status = 'Cancelled';
                    break;
                default:
                    $status->status_color = 'status-inactive';
            }
        }
        
        return view('inventory.issuances.index')->with(compact('data', 'buttons'));
    }

    public function create() {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/issuances', 'Create');
        $employees = Employee::orderBy('emp_first_name', 'asc')->where('status', '1')->get();
        $issuances = InvIssuance::orderBy('id', 'asc')->where('status', '1')->get();
        
        // items
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $product = ProductItem::select('product_items.*', 'inv_stocks.balance_qty')
                                ->join('inv_stocks', 'product_items.id', '=', 'inv_stocks.item_id')
                                ->where('inv_stocks.balance_qty', '>', 0)
                                ->where('product_items.status', 1)
                                ->orderBy('product_name', 'asc')
                                ->get();
        $branches = Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        return view('inventory.issuances.create')->with(compact('issuances', 'employees', 'product', 'brands','resolutions', 'packages', 'branches'));
    }

    public function store(Request $request){
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/issuances', 'Create');
        // Check inventory
        $selectedItems = $request->item;
        $balanceCheck = InventoryHelper::checkBalance($selectedItems);
        if (!$balanceCheck['success']) {
            return response()->json([
                'success' => false,
                'error_type' => $balanceCheck['error_type'],
                'message' => $balanceCheck['message'],
                'item_name' => $balanceCheck['item_name'],
                'item_qty' => $balanceCheck['item_qty']
            ]);
        }
    
    
        // Generate new issuance number and control number
        $currentYear = Carbon::now()->year;
        $lastTwoDigits = substr($currentYear, -2);
        $last_issuance_number = InvIssuance::selectRaw('CAST(issuance_number AS INTEGER) as numeric_value')
            ->whereYear('created_at', $currentYear)
            ->orderBy('numeric_value', 'desc')
            ->first();
    
        if ($last_issuance_number) {
            $newIssuanceNumber = str_pad($last_issuance_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newIssuanceNumber = '00001';
        }
    
        $newControlNo = "IS".$lastTwoDigits."-".$newIssuanceNumber;
    
        // Create issuance record
        $details = array(
            "issuance_type" => 1,
            "issuance_date" => $request->issuance_date,
            "issuance_number" => $newIssuanceNumber,
            "issuance_control_no" => $newControlNo,
            "issued_by" => Auth::user()->id,
            "received_by" => $request->received_by,
            "branch_id" => $request->branch_id,
            "remarks" => $request->remarks,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
    
        $insert_issuance = InvIssuance::create($details);
    
        // Create issuance items
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
    
        // Update inventory deduction if posted
            foreach ($request->item as $item) {
                $item_qty = $item["issued_qty"];
                $item_id = $item["item_id"];
                DB::table('inv_stocks')->where('item_id', $item_id)->update(
                    ['balance_qty' => DB::raw('balance_qty - ' . $item_qty),
                     'issued_qty' => DB::raw('issued_qty + ' . $item_qty),
                    ]
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
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Data has been saved successfully'
        ]);
    }
    


    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/issuances', 'Remove');
        $issuance = InvIssuance::find($id);

        if ($issuance) {
            $new_status = $issuance->status == 1 ? 0 : 1;
            $issuance->status = $new_status;

            if ($issuance->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/issuances', 'Read');
        $buttons = PermissionHelper::getButtonStates('/inventory/issuances');
        $data = InvIssuance::findOrFail($id);
        $item_details = InvIssuanceItems::where('issuance_id',$id)->get();
        $employees = Employee::orderBy('emp_first_name', 'asc')->where('status', '1')->get();
        
        // items
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $product = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $branches = Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();

        return view('inventory.issuances.edit')->with(compact('employees', 'product', 'brands','resolutions', 'packages', 'branches', 'data', 'item_details', 'buttons'));
    }

    public function cancelTransaction(Request $request, $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/issuances', 'Update');
        $data = InvIssuance::findOrFail($id);
        $details = array(
            "is_cancelled" => 1,
            "status" => 2,
            "updated_by" => Auth::user()->id,
        );
        InvIssuance::where('id', $id)->update($details);

        // Update inventory deduction if posted
        foreach ($request->item as $item) {
            $item_qty = $item["issued_qty"];
            $item_id = $item["item_id"];
            DB::table('inv_stocks')->where('item_id', $item_id)->update(
                ['balance_qty' => DB::raw('balance_qty + ' . $item_qty),
                 'issued_qty' => DB::raw('issued_qty - ' . $item_qty),
                ]
            );
        }

        foreach ($request->item as $item) {
            $item_qty = $item["issued_qty"];
            DB::table('employee_inventory')->updateOrInsert(
                ['item_id' => $item["item_id"], 'emp_id' => $data->received_by],
                ['balance_qty' => DB::raw('balance_qty - '. $item_qty ),
                 'issued_qty' => DB::raw('issued_qty - ' . $item_qty),
                ]
            );
        }

        
        return back()->with('message','Data has been updated successfully');
    }
}
