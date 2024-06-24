<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Requests\ProductCategoryRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class ProductCategoryController extends Controller
{
    public function index()
    {
        $data = ProductCategory::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('product.category.index')->with(compact('data'));
    }

    public function create()
    {
        return view('product.category.create');
    }

    public function store(ProductCategoryRequest $request)
    {
        // dd($request); punta tayo sa create
        $validated = $request->validated();
        
        $details = array(
            // column name => $request->input_name,          
            // "group_code" => $request->group_code,
            // "group_icon" => $request->group_icon,
            // "group_description" => $request->group_description,
            "category_name" => $request->category_name, 
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        ProductCategory::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $data = ProductCategory::findOrFail($id);
        return view('product/category.edit', ['category' => $data]);
    }

    public function update(ProductCategoryRequest $request, ProductCategory $id)
    {
        $validated = $request->validated();
        $details = array(
            "category_name" => $request->category_name, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    
    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/product/category/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }

    public function delete(ProductCategory $category, $id)
    {
        $current_status = ProductCategory::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $category->where('id', $id)->update($update);
        return redirect('/product/category'); // kulang yung slug
    }
}
