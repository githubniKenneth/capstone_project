<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductBrand;
use App\Http\Requests\ProductBrandRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Helpers\PermissionHelper;


class ProductBrandController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/brand', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/brand');
        $data = ProductBrand::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        return view('product.brand.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/brand', 'Create');
        return view('product.brand.create');
    }

    public function store(ProductBrandRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/brand', 'Create');
        $validated = $request->validated();
        
        $details = array(
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
        $is_authorized = PermissionHelper::checkAuthorization('/product/brand', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/brand');
        $data = ProductBrand::findOrFail($id);
        return view('product/brand.edit', ['brand' => $data, 'buttons' => $buttons]);
    }

    public function update(ProductBrandRequest $request, ProductBrand $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/brand', 'Update');
        $validated = $request->validated();
        $details = array(
            "brand_name" => $request->brand_name, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/brand', 'Remove');
        $brand = ProductBrand::find($id);

        if ($brand) {
            $new_status = $brand->status == 1 ? 0 : 1;
            $brand->status = $new_status;

            if ($brand->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

}
