<?php

namespace App\Http\Controllers\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductItem;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductSeries;
use App\Models\ProductResolution;
use App\Models\UnitOfMeasurement;


use App\Http\Requests\ProductItemRequest;
use Auth;

class ItemController extends Controller
{
    public function index()
    {
        $data = ProductItem::select('product_items.*', 'product_brands.brand_name', 'unit_of_measurements.uom_shortname')
        ->orderBy('product_items.created_at', 'desc')
        ->leftJoin('product_brands', 'product_brands.id', '=', 'product_items.brand_id')
        ->leftJoin('unit_of_measurements', 'unit_of_measurements.id', '=', 'product_items.uom_id')
        ->get();
        // dd($data);
        return view('product.item.index')->with(compact('data'));
    }
    public function create()
    {
        $uom = UnitOfMeasurement::orderBy('uom_shortname', 'asc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $categories = ProductCategory::orderBy('category_name', 'asc')->where('status', '1')->get();;
        $series = ProductSeries::orderBy('series_name', 'asc')->where('status', '1')->get();
        $camera_resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $item_types = config('constant.item_type');
        return view('product.item.create')->with(compact('item_types','uom', 'brands', 'categories', 'series', 'camera_resolutions'));
    }

    public function edit($id)
    {
        $item = ProductItem::findOrFail($id);
        $uom = UnitOfMeasurement::orderBy('uom_shortname', 'asc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $categories = ProductCategory::orderBy('category_name', 'asc')->where('status', '1')->get();
        $series = ProductSeries::orderBy('series_name', 'asc')->where('status', '1')->get();
        $camera_resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $item_types = config('constant.item_type');
        // return view('product/item.edit', ['item' => $data]);
        return view('product/item.edit')->with(compact('item','uom','brands', 'categories', 'series','camera_resolutions','item_types'));
    }

    public function update(Request $request, ProductItem $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('public/uploads/itemImages', $imageName);
    
            // Delete previous image if exists
            if ($id->file_path) {
                Storage::delete($id->file_path);
            }
        } else {
            // If no new image is uploaded, retain the previous image
            $imagePath = $request->current_image;
        }
    
        $details = [
            "uom_id" => $request->uom_id,
            "brand_id" => $request->brand_id,
            "file_path" => $imagePath,
            "product_name" => $request->product_name,
            "product_price" => $request->product_price,
            "product_desc" => $request->product_desc,
            "remarks" => $request->remarks, 
            "category_id" => $request->category_id,
            "series_id" => $request->series_id,
            "resolution_id" => $request->resolution_desc,
            "status" => 1,
            "created_by" => 0,
            "updated_by" => Auth::user()->id,
        ];
        
        $id->update($details);
        
        return back()->with('message','Data has been update successfully');
    }


    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle File Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('public/uploads/itemImages', $imageName);

            // $resizedImage = Image::make($image)->resize(100, 100)->encode();
            // Storage::put($imagePath, $resizedImage);
        } else {
            $imagePath = null;
        }
    
        // Create product item
        $details = [
            "item_type" => $request->input('item_type'), 
            "uom_id" => $request->input('uom_id'),
            "product_name" => $request->input('product_name'),
            "product_price" => $request->input('product_price'),
            "product_desc" => $request->input('product_desc'),
            "remarks" => $request->input('remarks'), 
            "brand_id" => $request->input('brand_id'),
            "category_id" => $request->input('category_id'),
            "series_id" => $request->input('series_id'),
            "resolution_id" => $request->input('resolution_id'),
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
            "file_path" => $imagePath,
        ];
    
        ProductItem::create($details);
    
        return back()->with('message','Data has been saved successfully');
    }
    
    

    public function showItems()
    {
        $items = ProductItem::select('*')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('product.item.item-list-modal')->with(compact('items'));
    }


    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/product/item/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }


    public function delete(ProductItem $items, $id)
    {
        $current_status = ProductItem::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $items->where('id', $id)->update($update);
        return redirect('/product/item'); // kulang yung slug
    }

}
