<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOrder;
use App\Helpers\PermissionHelper;

class RehabRepairController extends Controller
{
    public function index() {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/rehab-repair', 'Read');
        $buttons = PermissionHelper::getButtonStates('/deployment/rehab-repair');
        $data = JobOrder::orderBy('created_at', 'desc')->where('scope_id', 4)->get();
       
        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }

        return view('deployment.rehab-repair.index')->with(compact('data', 'buttons'));
    }
}
