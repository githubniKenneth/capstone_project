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

class ReceiveController extends Controller
{
    public function index() {

        $data = InvReceiving::orderBy('created_at', 'desc')->get();
        return view('inventory.receive.index')->with(compact('data'));
    }

    public function create()
    {
        $product = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        return view('inventory.receive.create')->with(compact('product'));
    }

    public function store(Request $request)
    {

        // dd($request->input('action'));
        if ($request->has('action') && $request->input('action') == 'saveButton') {
            $is_posted = 0;
        } elseif ($request->has('action') && $request->input('action') == 'submitButton') {
            $is_posted = 1;
        }
        
        // dd($request->is_posted);
        $inv_received = array(
            "rec_code" => $request->rec_code,
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
                    "uom_id" => $item["item_qty"], 
                    "rec_qty" => $item["item_qty"], 
                    "status" => 1,
                    "is_posted" => $is_posted,
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                InvReceivingDetails::create($inv_received_details);
            // }
            
        }

        
        if ($is_posted == 1)
        {
            foreach ($request->item as $item) {
                $item_qty = $item["item_qty"];
            
                DB::table('inv_stocks')->updateOrInsert(
                    ['item_id' => $item["item_id"]],

                    ['balance_qty' => DB::raw('balance_qty + ' . $item_qty),
                    'issued_qty' => DB::raw('issued_qty + ' . 0),
                    'returned_qty' => DB::raw('returned_qty + ' . 0),
                    'sold_qty' => DB::raw('sold_qty + ' . 0),
                    'adjusted_qty' => DB::raw('adjusted_qty + ' . 0),
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
        $data = InvReceiving::findOrFail($id);
        $product = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $receive_details = InvReceivingDetails::where('rec_id',$id)->get();
        return view('inventory/receive.edit', ['inv_received' => $data, 'product' => $product, 'received_details' => $receive_details]);
    }

    public function update(Request $request, InvReceiving $id) 
    {
        // $validated = $request->validated();
        $details = array(
            "rec_code" => $request->rec_code,
            "rec_supplier" => $request->rec_supplier, 
            "rec_date" => $request->rec_date,
            "rec_remarks" => $request->rec_remarks,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }
}
