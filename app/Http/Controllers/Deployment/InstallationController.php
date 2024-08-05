<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOrder;
use App\Helpers\PermissionHelper;

class InstallationController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/installation', 'Read');
        $buttons = PermissionHelper::getButtonStates('/deployment/installation');
        $data = JobOrder::orderBy('created_at', 'desc')->where('scope_id', 1)->get();

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('deployment.installation.index')->with(compact('data', 'buttons'));
        // return view('job-order.index');
    }
}
