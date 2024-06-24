<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOrder;

class UpgradeController extends Controller
{
    public function index() {
        $data = JobOrder::orderBy('created_at', 'desc')->where('scope_id', 2)->get();
        return view('deployment.upgrade.index')->with(compact('data'));
    }
}
