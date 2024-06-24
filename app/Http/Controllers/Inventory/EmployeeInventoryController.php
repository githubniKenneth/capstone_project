<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeInventory;

class EmployeeInventoryController extends Controller
{
    public function index() {
        $emp_inv = EmployeeInventory::orderBy('created_at', 'desc')->distinct('emp_id', 'item_id')->get();
        return view('inventory/employee-inventory.index')->with(compact('emp_inv'));
    }

    public function create() {
        $emp_inv = EmployeeInventory::orderBy('id', 'asc')->where('id', '1')->get();
        return view('inventory.employee-inventory.create')->with(compact('emp_inv'));
    }
}
