<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RemittanceController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/sales/remittance', 'Read'); 
        return view('sales.remittance.index');
    }
}
