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
        $data = ProductResolution::orderBy('created_at', 'desc')->get();
        return view('product.resolution.index')->with(compact('data'));
    }

    public function create()
    {
        return view('product.resolution.create');
    }

    public function store(ProductResolutionRequest $request)
    {
        // dd($request); punta tayo sa create
        $validated = $request->validated();
        
        $details = array(
            // column name => $request->input_name,          
            // "group_code" => $request->group_code,
            // "group_icon" => $request->group_icon,
            // "group_description" => $request->group_description,
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
        $data = ProductResolution::findOrFail($id);
        return view('product/resolution.edit', ['resolution' => $data]);
    }

    public function update(ProductResolutionRequest $request, ProductResolution $id)
    {
        $validated = $request->validated();
        $details = array(
            "resolution_desc" => $request->resolution_desc, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/product/resolution/delete/".$id; // kulang yung slug
        return view('components.remove-form', compact('action'));
    }

    public function delete(ProductResolution $resolution, $id)
    {
        $current_status = ProductResolution::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $resolution->where('id', $id)->update($update);
        return redirect('/product/resolution'); // kulang yung slug
    }

}
