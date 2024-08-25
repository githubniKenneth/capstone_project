<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\WebsiteProductRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ProductItem;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductSeries;
use App\Models\ProductResolution;
use App\Models\UnitOfMeasurement;


class ProductController extends Controller
{
    public function index()
    {
        $items = ProductItem::where('status', 1)->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $camera_resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        $series = ProductSeries::orderBy('series_name', 'asc')->where('status', '1')->get();

        return view('website.product')->with(compact('items', 'brands', 'camera_resolutions', 'series'));
    }



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
    
        return redirect()->route('product-item.index')->with('success', 'Product item has been created successfully.');
    }

    public function showItems()
    {
        $products = ProductItem::select('*')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('product.item.item-list-modal')->with(compact('products'));
    }
}
