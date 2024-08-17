<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeInventory;
use Auth;
use App\Helpers\PermissionHelper;

class EmployeeInventoryController extends Controller
{
    public function index() {
        $is_authorized = PermissionHelper::checkAuthorization('/inventory/employee-items', 'Read');
        $data_access = Auth::user()->data_access;
        $emp_id = Auth::user()->emp_id; //employee id of the user

        if ($data_access == 1)
        {
            $emp_inv = EmployeeInventory::orderBy('balance_qty', 'desc')->distinct('emp_id', 'item_id')->get();
        }
        elseif ($data_access == 3)
        {
            $emp_inv = EmployeeInventory::orderBy('created_at', 'desc')
                                        ->distinct('emp_id', 'item_id')
                                        ->where('emp_id', $emp_id)
                                        ->get();
        }
        return view('inventory/employee-inventory.index')->with(compact('emp_inv'));
    }

    public function create() {
        $emp_inv = EmployeeInventory::orderBy('id', 'asc')->where('id', '1')->get();
        return view('inventory.employee-inventory.create')->with(compact('emp_inv'));
    }
}
