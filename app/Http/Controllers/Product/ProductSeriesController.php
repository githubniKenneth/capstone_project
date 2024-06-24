<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSeries;
use App\Http\Requests\ProductSeriesRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class ProductSeriesController extends Controller
{
    public function index()
    {
        $data = ProductSeries::orderBy('created_at', 'desc')->get();
        return view('product.series.index')->with(compact('data'));
    }

    public function create()
    {
        return view('product.series.create');
    }

    public function store(ProductSeriesRequest $request)
    {
        // dd($request); punta tayo sa create
        $validated = $request->validated();
        
        $details = array(
            // column name => $request->input_name,          
            // "group_code" => $request->group_code,
            // "group_icon" => $request->group_icon,
            // "group_description" => $request->group_description,
            "series_name" => $request->series_name, 
            "status" => 1,
            "created_by" => 1,
            "updated_by" => 1,
        );
        ProductSeries::create($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function edit($id)
    {
        $data = ProductSeries::findOrFail($id);
        return view('product/series.edit', ['series' => $data]);
    }

    public function update(ProductSeriesRequest $request, ProductSeries $id)
    {
        $validated = $request->validated();
        $details = array(
            "series_name" => $request->series_name, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function remove(Request $request, $id)
    {
        $id = $id;
        $action = "/product/series/delete/".$id;
        return view('components.remove-form', compact('action'));
    }

    public function delete(ProductSeries $ProductSeries, $id)
    {
        $current_status = ProductSeries::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $ProductSeries->where('id', $id)->update($update);
        return redirect('/product/series');
    }

}
