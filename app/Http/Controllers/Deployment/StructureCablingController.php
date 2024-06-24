<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOrder;

class StructureCablingController extends Controller
{
    public function index() {
        $data = JobOrder::orderBy('created_at', 'desc')->where('scope_id', 3)->get();
        return view('deployment.structure-cabling.index')->with(compact('data'));
    }
}
