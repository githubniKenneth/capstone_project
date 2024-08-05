<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductItem;
use App\Models\ProductPackages;
use App\Models\ProductPackagesDetails;
use App\Models\ProductBrand;
use App\Models\ProductResolution;
use App\Models\UnitOfMeasurement;
use App\Helpers\PermissionHelper;
use Illuminate\Support\Facades\DB;
use Auth;

class ItemPackageController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/packages', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/packages');
        $data = ProductPackages::orderBy('created_at', 'desc')->get();
        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        return view('product.packages.index')->with(compact('data', 'buttons'));
    }
    
    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/packages', 'Create');
        $product = ProductItem::select('*')
        ->orderBy('created_at', 'desc')
        ->get();

        $camera_resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();

        // $product = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        return view('product.packages.create')->with(compact('product', 'brands', 'camera_resolutions'));
    }

    public function store(Request $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/packages', 'Create');
        $validatedData = $request->validate([
            'pack_name' => 'required',
            'pack_price' => 'required',
            'brand_id' => 'required',
            'resolution_id' => 'required',
            'camera_number' => 'required',
            'item' => 'required',
        ], [
            'pack_name.required' => 'The Name field is required.',
            'pack_price.required' => 'The Price field is required.',
            'brand_id.required' => 'The Brand field is required.',
            'resolution_id.required' => 'The Resolution field is required.',
            'camera_number.required' => 'The Camera No. field is required.',
            'item.required' => 'Please select item.',
        ]);
        
        $packaged_items = array(
            "pack_name" => $request->pack_name,
            "pack_price" => $request->pack_price, 
            "pack_description" => $request->pack_description,
            "pack_remarks" => $request->pack_remarks,
            "brand_id" => $request->brand_id,
            "resolution_id" => $request->resolution_id,
            "camera_number" => $request->camera_number,
            "technical_specification" => $request->technical_specification,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $package_item = ProductPackages::create($packaged_items);
        
        foreach ($request->item as $item) {
            
            $package_details = array(
                "package_id" => $package_item->id,
                "item_id" => $item["item_id"], 
                "item_qty" => $item["item_qty"], 
                "status" => 1,
                "created_by" => Auth::user()->id,
                "updated_by" => 0,
            );
            ProductPackagesDetails::create($package_details);
        }
        return back()->with('message','Data has been saved successfully');
    }   
    
    public function selectedItems(Request $request)
    {
        // Retrieve the selected data from the AJAX request
        $selectedData = $request->input('selectedData');
        $selectedItems = ProductItem::whereIn('id', $selectedData)->with('uom')->get();
        // dd($selectedItems);

        // Process the data as needed (e.g., store in a database, perform calculations)

        // [
        //     name:jg,
        //     desc: jjfj
        // ]
        // vallue.name
        // Send a response back to the client (you can customize the response structure)
        return response()->json(['selectedData' => $selectedItems]);
    }

    public function selectedPackagess(Request $request)
    {
        // Retrieve the selected data from the AJAX request
        
        $selectedData = $request->input('selectedData');

        $selectedItems = ProductPackagesDetails::whereIn('package_id', $selectedData)->with('item.uom')->get();
        $selectedPackage = ProductPackages::whereIn('id', $selectedData)->get();
        // dd($selectedPackage);
        $responseData = [
            'selected' => $selectedPackage,
            'selectedData' => $selectedItems,
        ];
        // dd($responseData):
        // dd($responseData);

        return response()->json($responseData);
    }

    public function getItemList()
    {
        $product = ProductItem::orderBy('product_name', 'asc')
        ->where('status', '1')
        ->get();
        return view('product.item.item-list-modal')->with(compact('product'));
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/packages', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/packages');
        $product = ProductItem::select('*')
        ->orderBy('created_at', 'desc')
        ->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $camera_resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $packages = ProductPackages::findOrFail($id);
        
        $package_details = ProductPackagesDetails::get();
        // dd($package_details);
        return view('product/packages.edit')->with(compact('packages','brands','camera_resolutions','package_details', 'product','buttons'));
    }

    public function update(Request $request, ProductPackages $id)
    {

        $is_authorized = PermissionHelper::checkAuthorization('/product/packages', 'Update');
        $validatedData = $request->validate([
            'pack_name' => 'required',
            'pack_price' => 'required',
            'brand_id' => 'required',
            'resolution_id' => 'required',
            'camera_number' => 'required',
            'item' => 'required',
        ], [
            'pack_name.required' => 'The Name field is required.',
            'pack_price.required' => 'The Price field is required.',
            'brand_id.required' => 'The Brand field is required.',
            'resolution_id.required' => 'The Resolution field is required.',
            'camera_number.required' => 'The Camera No. field is required.',
            'item.required' => 'Please select item.',
        ]);
        
        $packaged_items = array(
            "pack_name" => $request->pack_name,
            "pack_price" => $request->pack_price, 
            "pack_description" => $request->pack_description,
            "pack_remarks" => $request->pack_remarks,
            "brand_id" => $request->brand_id,
            "resolution_id" => $request->resolution_id,
            "camera_number" => $request->camera_number,
            "technical_specification" => $request->technical_specification,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $id->update($packaged_items);
        return back()->with('message','Data has been update successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/packages', 'Remove');
        $package = ProductPackages::find($id);

        if ($package) {
            $new_status = $package->status == 1 ? 0 : 1;
            $package->status = $new_status;

            if ($package->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
    
}
