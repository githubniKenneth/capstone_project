<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('user-role.index');
    }

    public function create()
    {
        return view('user-role.create');
    }
}
