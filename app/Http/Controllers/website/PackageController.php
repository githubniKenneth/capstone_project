<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\PackageRequest;
use Illuminate\Validation\Rule;
use App\Models\ProductItem;
use App\Models\ProductPackages;
use App\Models\ProductPackagesDetails;
use App\Models\ProductBrand;
use App\Models\ProductResolution;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $data = ProductPackages::orderBy('created_at', 'desc')->get();
        $item_lists = ProductPackagesDetails::with('item', 'item.uom')->orderBy('created_at', 'desc')->get();
        return view('website.package')->with(compact('data', 'item_lists'));
    }

    public function filter(Request $request)
    {
    // Check if it's an AJAX request for filtering
    if ($request->ajax() && $request->has('brands')) {
        $selectedBrands = $request->input('brands');

        // Fetch packages based on selected brands
        $filteredPackages = ProductPackages::whereIn('brand_id', $selectedBrands)->get();

        // Render the filtered packages using a blade view
        $view = view('website.filtered_packages')->with('packages', $filteredPackages)->render();

        // Return the rendered view as JSON response
        return response()->json(['html' => $view]);
    }

    // Return error response if it's not an AJAX request or if 'brands' parameter is missing
    return response()->json(['error' => 'Invalid request'], 400);
    }
}
