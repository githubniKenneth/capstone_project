<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Requests\ProductCategoryRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Helpers\PermissionHelper;


class ProductCategoryController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/category', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/category');
        $data = ProductCategory::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('product.category.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/category', 'Create');
        return view('product.category.create');
    }

    public function store(ProductCategoryRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/category', 'Create');
        $validated = $request->validated();
        
        $details = array(
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
        $is_authorized = PermissionHelper::checkAuthorization('/product/category', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/category');
        $data = ProductCategory::findOrFail($id);
        return view('product/category.edit', ['category' => $data, 'buttons' => $buttons]);
    }

    public function update(ProductCategoryRequest $request, ProductCategory $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/category', 'Update');
        $validated = $request->validated();
        $details = array(
            "category_name" => $request->category_name, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/category', 'Remove');
        $category = ProductCategory::find($id);

        if ($category) {
            $new_status = $category->status == 1 ? 0 : 1;
            $category->status = $new_status;

            if ($category->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }
}
