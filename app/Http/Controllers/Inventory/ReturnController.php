<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\ProductItem;
use App\Models\ProductPackages;
use App\Models\ProductResolution;
use App\Models\ProductBrand;
use App\Models\InvStocks;
use App\Models\InvReturn;
use App\Models\InvReturnItems;
use App\Models\EmployeeInventory;
use App\Models\Branch;
use App\Helpers\InventoryHelper;
use App\Helpers\PermissionHelper;

class ReturnController extends Controller
{
    //
    public function index() {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/returns', 'Read');
        $buttons = PermissionHelper::getButtonStates('/inventory/returns');
        $data_access = Auth::user()->data_access;
        $emp_id = Auth::user()->emp_id; //employee id of the user

        if ($data_access == 1)
        {
            $data = InvReturn::orderBy('created_at', 'desc')->get();
        }
        elseif ($data_access == 3)
        {
            $data = InvReturn::orderBy('created_at', 'desc')->where('returned_by', $emp_id)->get();
        }
        
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

        return view('inventory.return.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/returns', 'Create');
        $employees = Employee::orderBy('emp_first_name', 'asc')->where('status', '1')->get();
        
        // items
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $product = ProductItem::select('product_items.*', 'employee_inventory.balance_qty')
                                ->join('employee_inventory', 'product_items.id', '=', 'employee_inventory.item_id')
                                ->where('employee_inventory.balance_qty', '>', 0)
                                ->where('product_items.status', 1)
                                ->orderBy('product_name', 'asc')
                                ->get();
        $branches = Branch::orderBy('created_at', 'desc')->where('branch_status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        return view('inventory.return.create')->with(compact('employees', 'product', 'brands','resolutions', 'packages', 'branches'));
    }

    public function store(Request $request){
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/returns', 'Create');

        // Check inventory
        $selectedItems = $request->item;
        $balanceCheck = InventoryHelper::checkEmployeeBalance($selectedItems, $request->returned_by);
        // dd($balanceCheck);
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
        $last_return_number = InvReturn::selectRaw('CAST(return_number AS INTEGER) as numeric_value')
            ->whereYear('created_at', $currentYear)
            ->orderBy('numeric_value', 'desc')
            ->first();
    
        if ($last_return_number) {
            $newReturnNumber = str_pad($last_return_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newReturnNumber = '00001';
        }
    
        $newControlNo = "RTN".$lastTwoDigits."-".$newReturnNumber;
    
        // Create issuance record
        $details = array(
            "return_date" => $request->return_date,
            "return_number" => $newReturnNumber,
            "return_control_no" => $newControlNo,
            "received_by" => Auth::user()->id,
            "returned_by" => $request->returned_by,
            "branch_id" => $request->branch_id,
            "remarks" => $request->remarks,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
    
        $insert_return = InvReturn::create($details);
    
        // Create issuance items
        foreach ($request->item as $item) {
            
        // dd($item['issued_qty']);
            $return_details = array(
                "return_id" => $insert_return->id,
                "emp_id" => $request->returned_by,
                "item_id" => $item["item_id"], 
                "return_qty" => $item["issued_qty"], 
                "status" => 1,
                "created_by" => Auth::user()->id,
                "updated_by" => 0,
            );
            InvReturnItems::create($return_details);
        }
    
        // Update inventory deduction if posted
        foreach ($request->item as $item) {
            $item_qty = $item["issued_qty"];
            $item_id = $item["item_id"];
            DB::table('inv_stocks')->where('item_id', $item_id)->update(
                ['balance_qty' => DB::raw('balance_qty + ' . $item_qty),
                 'returned_qty' => DB::raw('returned_qty + ' . $item_qty),
                ]
            );

            DB::table('employee_inventory')
                ->where('item_id', $item_id)
                ->where('emp_id' , $request->returned_by)
                ->update(['balance_qty' => DB::raw('balance_qty - '. $item_qty ),
                          'returned_qty' => DB::raw('returned_qty + '. $item_qty )
                         ]
            );
        }

        // foreach ($request->item as $item) {
        //     $item_qty = $item["issued_qty"];
            
        // }
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Data has been saved successfully'
        ]);
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/returns', 'Update');
        $buttons = PermissionHelper::getButtonStates('/inventory/returns');

        $data = InvReturn::findOrFail($id);
        $item_details = InvReturnItems::where('return_id',$id)->get();

        return view('inventory.return.edit')->with(compact('data', 'buttons', 'item_details'));
    }

    public function cancelTransaction(Request $request, $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/returns', 'Update');
        $data = InvReturn::findOrFail($id);
        $details = array(
            "status" => 2,
            "updated_by" => Auth::user()->id,
        );
        InvReturn::where('id', $id)->update($details);

        // Update inventory deduction if posted
        foreach ($request->item as $item) {
            $item_qty = $item["issued_qty"];
            $item_id = $item["item_id"];
            DB::table('inv_stocks')->where('item_id', $item_id)->update(
                ['balance_qty' => DB::raw('balance_qty - ' . $item_qty),
                 'returned_qty' => DB::raw('returned_qty - ' . $item_qty),
                ]
            );

            DB::table('employee_inventory')
                ->where('item_id', $item_id)
                ->where('emp_id' , $data->returned_by)
                ->update(['balance_qty' => DB::raw('balance_qty + '. $item_qty ),
                          'returned_qty' => DB::raw('returned_qty - '. $item_qty )
                         ]
            );
        }
        return redirect()->route('return.index')->with('message','Data has been updated successfully');
    }
    
}
