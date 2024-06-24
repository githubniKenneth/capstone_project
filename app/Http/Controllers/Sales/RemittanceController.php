<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RemittanceController extends Controller
{
    public function index()
    {
        // $data = SalesOrder::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('sales.remittance.index');
    }
}
