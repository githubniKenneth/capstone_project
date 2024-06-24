<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;
use App\Http\Requests\ProductBrandRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class ProductBrandController extends Controller
{
    public function index()
    {
        $data = ProductBrand::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('product.brand.index')->with(compact('data'));
    }

    public function create()
    {
        return view('product.brand.create');
    }

    public function store(ProductBrandRequest $request)
    {
        // dd($request); punta tayo sa create
        $validated = $request->validated();
        
        $details = array(
            // column name => $request->input_name,          
            // "group_code" => $request->group_code,
            // "group_icon" => $request->group_icon,
            // "group_description" => $request->group_description,
            "brand_name" => $request->brand_name, 
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        ProductBrand::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $data = ProductBrand::findOrFail($id);
        return view('product/brand.edit', ['brand' => $data]);
    }

    public function update(ProductBrandRequest $request, ProductBrand $id)
    {
        $validated = $request->validated();
        $details = array(
            "brand_name" => $request->brand_name, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/product/brand/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }

    public function delete(ProductBrand $brand, $id)
    {
        $current_status = ProductBrand::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $brand->where('id', $id)->update($update);
        return redirect('/product/brand'); // kulang yung slug
    }

}
