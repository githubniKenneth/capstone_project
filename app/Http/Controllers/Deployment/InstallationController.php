<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOrder;

class InstallationController extends Controller
{
    public function index()
    {
        // $data = Installation::orderBy('created_at', 'desc')->get();
        $data = JobOrder::orderBy('created_at', 'desc')->where('scope_id', 1)->get();
        return view('deployment.installation.index')->with(compact('data'));
        // return view('job-order.index');
    }
}
