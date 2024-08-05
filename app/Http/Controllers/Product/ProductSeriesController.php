<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSeries;
use App\Http\Requests\ProductSeriesRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Helpers\PermissionHelper;


class ProductSeriesController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/series', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/series');
        $data = ProductSeries::orderBy('created_at', 'desc')->get();
        return view('product.series.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {	
        $is_authorized = PermissionHelper::checkAuthorization('/product/series', 'Create');
        return view('product.series.create');
    }

    public function store(ProductSeriesRequest $request)
    {	
        $is_authorized = PermissionHelper::checkAuthorization('/product/series', 'Create');
        $validated = $request->validated();
        
        $details = array(
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
        $is_authorized = PermissionHelper::checkAuthorization('/product/series', 'Read');
        $buttons = PermissionHelper::getButtonStates('/product/series');
        $data = ProductSeries::findOrFail($id);
        return view('product/series.edit', ['series' => $data, 'buttons' => $buttons]);
    }

    public function update(ProductSeriesRequest $request, ProductSeries $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/series', 'Update');
        $validated = $request->validated();
        $details = array(
            "series_name" => $request->series_name, 
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/product/series', 'Remove');
        $series = ProductSeries::find($id);

        if ($series) {
            $new_status = $series->status == 1 ? 0 : 1;
            $series->status = $new_status;

            if ($series->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

}
