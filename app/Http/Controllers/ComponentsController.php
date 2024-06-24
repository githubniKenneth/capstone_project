<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Module;

class ComponentsController extends Controller
{
    public function fetchSidebar()
    {
        // $modules = Module::select('id','module_name', 'group_id')->where('status', 1)->get();
        // $data = Group::with('modules')->where('status', 1)->get();
        // return view('partials.sidebar')->with(compact('data'));
    }
}
