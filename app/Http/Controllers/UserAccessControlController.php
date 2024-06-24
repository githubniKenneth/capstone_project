<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccessControl;

class UserAccessControlController extends Controller
{
    public function index()
    {
        $data = UserAccessControl::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);
        return view('user-access-control.index')->with(compact('data'));
    }
}
