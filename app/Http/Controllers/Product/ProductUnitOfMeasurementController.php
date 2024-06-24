<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitOfMeasurement;
use App\Http\Requests\UnitOfMeasurementRequest;


class ProductUnitOfMeasurementController extends Controller
{
    public function index()
    {
        $data = UnitOfMeasurement::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('product.uom.index')->with(compact('data'));
    }

    public function create()
    {
        return view('product.uom.create');
    }

    public function store(UnitOfMeasurementRequest $request)
    {
        // dd($request); punta tayo sa create
        $validated = $request->validated();
        
        $details = array(
            // column name => $request->input_name,          
            // "group_code" => $request->group_code,
            // "group_icon" => $request->group_icon,
            // "group_description" => $request->group_description,
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
        $data = UnitOfMeasurement::findOrFail($id);
        return view('product/uom.edit', ['uom' => $data]);
    }

    public function update(UnitOfMeasurementRequest $request, UnitOfMeasurement $id)
    {
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

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/product/uom/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }

    public function delete(UnitOfMeasurement $uom, $id)
    {
        $current_status = UnitOfMeasurement::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $uom->where('id', $id)->update($update);
        return redirect('/product/uom'); // kulang yung slug
    }

}
