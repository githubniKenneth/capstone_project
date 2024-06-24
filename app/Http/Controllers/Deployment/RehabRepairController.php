<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOrder;

class RehabRepairController extends Controller
{
    public function index() {
        $data = JobOrder::orderBy('created_at', 'desc')->where('scope_id', 4)->get();
        return view('deployment.rehab-repair.index')->with(compact('data'));
    }
}
