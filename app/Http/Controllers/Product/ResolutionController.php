<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductResolution;
use App\Http\Requests\ProductResolutionRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class ResolutionController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/resolution', 'Read');	
        $buttons = PermissionHelper::getButtonStates('/product/resolution');
        $data = ProductResolution::orderBy('created_at', 'desc')->get();
        return view('product.resolution.index')->with(compact('data'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/resolution', 'Create');
        return view('product.resolution.create');
    }

    public function store(ProductResolutionRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/resolution', 'Create');
        $validated = $request->validated();
        
        $details = array(
            "resolution_desc" => $request->resolution_desc, 
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        ProductResolution::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/resolution', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/resolution');
        $data = ProductResolution::findOrFail($id);
        return view('product/resolution.edit', ['resolution' => $data, 'buttons' => $buttons]);
    }

    public function update(ProductResolutionRequest $request, ProductResolution $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/resolution', 'Update');
        $validated = $request->validated();
        $details = array(
            "resolution_desc" => $request->resolution_desc, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/resolution', 'Remove');
        $resolution = ProductResolution::find($id);

        if ($resolution) {
            $new_status = $resolution->status == 1 ? 0 : 1;
            $resolution->status = $new_status;

            if ($resolution->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

}
