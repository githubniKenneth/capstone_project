<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductItem;
use App\Models\InvReceiving;
use App\Models\InvReceivingDetails;
use App\Models\InvStocks;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\Helpers\PermissionHelper;

class ReceiveController extends Controller
{
    public function index() {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/receive', 'Read');
        $buttons = PermissionHelper::getButtonStates('/inventory/receive');
        $data = InvReceiving::orderBy('created_at', 'desc')->get();
        
        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
            $status->posting_status = $status->is_posted == 1 ? 'status-active' : 'status-inactive';
        }

        return view('inventory.receive.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/receive', 'Create');
        $product = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        return view('inventory.receive.create')->with(compact('product'));
    }

    public function store(Request $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/receive', 'Create');
        $validatedData = $request->validate([
            'rec_supplier' => 'required',
            'rec_date' => 'required',
            'item' => 'required',
            'item.*.quantity' => 'required|numeric',
        ], [
            'rec_supplier.required' => 'The Supplier field is required.',
            'rec_date.required' => 'The Date field is required.',
            'item.required' => 'Please select an item.',
            'item.*.quantity.required' => 'Quantity is required for each item.',
            'item.*.quantity.numeric' => 'Quantity must be a number.',
        ]);

        $currentYear = Carbon::now()->year;
        $lastTwoDigits = substr($currentYear, -2);
        $last_rec_number = InvReceiving::selectRaw('CAST(rec_number AS INTEGER) as numeric_value')->whereYear('created_at', $currentYear)->orderBy('numeric_value', 'desc')->first();
        
        if ($last_rec_number) {
            $newRecNumber = str_pad($last_rec_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newRecNumber = '00001';
        }
        $newControlNo = "RCV".$lastTwoDigits."-".$newRecNumber;
        
        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
        }
        
        // dd($request->is_posted);
        $inv_received = array(
            "rec_code" => $newControlNo,
            "rec_number" => $newRecNumber,
            "rec_supplier" => $request->rec_supplier, 
            "rec_date" => $request->rec_date,
            "rec_remarks" => $request->rec_remarks,
            "status" => 1,
            "is_posted" => $is_posted,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $inv_receive_store = InvReceiving::create($inv_received);
        
        foreach ($request->item as $item) {
                $inv_received_details = array(
                    "rec_id" => $inv_receive_store->id,
                    "item_id" => $item["item_id"], 
                    "rec_qty" => $item["item_qty"], 
                    "status" => 1,
                    "is_posted" => $is_posted,
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                InvReceivingDetails::create($inv_received_details);
        }

        
        if ($is_posted == 1)
        {
            foreach ($request->item as $item) {
                $item_qty = $item["item_qty"];
            
                DB::table('inv_stocks')->updateOrInsert(
                    ['item_id' => $item["item_id"]],

                    ['balance_qty' => DB::raw('balance_qty + ' . $item_qty),
                    'received_qty' => DB::raw('received_qty + ' . $item_qty),
                    'issued_qty' => DB::raw('issued_qty + ' . 0),
                    'returned_qty' => DB::raw('returned_qty + ' . 0),
                    'sold_qty' => DB::raw('sold_qty + ' . 0),
                    'adjusted_qty' => DB::raw('adjusted_qty + ' . 0),
                    'ordered_qty' => DB::raw('ordered_qty + ' . 0),
                    'status' => 1,
                    'created_by' => Auth::user()->id,
                    'updated_by' => 0
                    ]
                );
            }
        }

        return back()->with('message','Data has been saved successfully');
    }   

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/receive', 'Read');
        $buttons = PermissionHelper::getButtonStates('/inventory/receive');
        $data = InvReceiving::findOrFail($id);
        $product = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $receive_details = InvReceivingDetails::where('rec_id',$id)->get();
        // dd($receive_details);
        return view('inventory/receive.edit', ['inv_received' => $data, 'product' => $product, 'received_details' => $receive_details, 'buttons' => $buttons]);
    }

    public function update(Request $request, InvReceiving $id) 
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/receive', 'Update');
        $validatedData = $request->validate([
            'rec_supplier' => 'required',
            'rec_date' => 'required',
            'item' => 'required',
            'item.*.quantity' => 'required|numeric',
        ], [
            'rec_supplier.required' => 'The Supplier field is required.',
            'rec_date.required' => 'The Date field is required.',
            'item.required' => 'Please select an item.',
            'item.*.quantity.required' => 'Quantity is required for each item.',
            'item.*.quantity.numeric' => 'Quantity must be a number.',
        ]);
        
        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
        }

        $details = array(
            "rec_supplier" => $request->rec_supplier, 
            "rec_date" => $request->rec_date,
            "rec_remarks" => $request->rec_remarks,
            "is_posted" => $is_posted,
            "status" => 1,
            "updated_by" => Auth::user()->id,
        );
        $id->update($details);

        if ($request->item){
            InvReceivingDetails::where('rec_id', $id->id)
                        ->delete();
            foreach ($request->item as $item) {
                $inv_received_details = array(
                    "rec_id" => $id->id,
                    "item_id" => $item["item_id"], 
                    "rec_qty" => $item["item_qty"], 
                    "status" => 1,
                    "is_posted" => $is_posted,
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                InvReceivingDetails::create($inv_received_details);
                
                
                // dd($item['item_id']);
            }
        }
        
        if ($is_posted == 1)
        {
            foreach ($request->item as $item) {
                $item_qty = $item["item_qty"];
            
                DB::table('inv_stocks')->updateOrInsert(
                    ['item_id' => $item["item_id"]],

                    ['balance_qty' => DB::raw('balance_qty + ' . $item_qty),
                     'received_qty' => DB::raw('received_qty + ' . $item_qty),
                     'issued_qty' => DB::raw('issued_qty + ' . 0),
                     'returned_qty' => DB::raw('returned_qty + ' . 0),
                     'sold_qty' => DB::raw('sold_qty + ' . 0),
                     'adjusted_qty' => DB::raw('adjusted_qty + ' . 0),
                     'ordered_qty' => DB::raw('ordered_qty + ' . 0),
                     'status' => 1,
                     'created_by' => Auth::user()->id,
                     'updated_by' => 0
                    ]
                );
            }
        }
        
        return back()->with('message','Data has been updated successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/receive', 'Remove');
        $receive = InvReceiving::find($id);

        if ($receive) {
            $new_status = $receive->status == 1 ? 0 : 1;
            $receive->status = $new_status;

            if ($receive->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
}
