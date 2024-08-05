<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\InvStocks;
use Illuminate\Support\Facades\DB;



class StocksController extends Controller
{
    public function index() {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/stocks', 'Read');
        $data = InvStocks::orderBy('created_at', 'desc')->get();
        
        return view('inventory.stocks.index')->with(compact('data'));
    }

}


