<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitOfMeasurement;
use App\Http\Requests\UnitOfMeasurementRequest;
use App\Helpers\PermissionHelper;


class ProductUnitOfMeasurementController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/uom', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/uom');
        $data = UnitOfMeasurement::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('product.uom.index')->with(compact('data'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/uom', 'Create');
        return view('product.uom.create');
    }

    public function store(UnitOfMeasurementRequest $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/uom', 'Create');
        $validated = $request->validated();
        
        $details = array(
            "uom_name" => $request->uom_name, 
            "uom_shortname" => $request->uom_shortname,
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        UnitOfMeasurement::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/uom', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/uom');
        $data = UnitOfMeasurement::findOrFail($id);
        return view('product/uom.edit', ['uom' => $data, 'buttons' => $buttons]);
    }

    public function update(UnitOfMeasurementRequest $request, UnitOfMeasurement $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/uom', 'Update');
        $validated = $request->validated();
        $details = array(
            "uom_name" => $request->uom_name, 
            "uom_shortname" => $request->uom_shortname, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }
    
    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/uom', 'Remove');
        $uom = UnitOfMeasurement::find($id);

        if ($uom) {
            $new_status = $uom->status == 1 ? 0 : 1;
            $uom->status = $new_status;

            if ($uom->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

}
