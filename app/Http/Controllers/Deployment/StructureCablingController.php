<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOrder;
use App\Helpers\PermissionHelper;

class StructureCablingController extends Controller
{
    public function index() {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/structure-cabling', 'Read');
        $buttons = PermissionHelper::getButtonStates('/deployment/structure-cabling');
        $data = JobOrder::orderBy('created_at', 'desc')->where('scope_id', 3)->get();

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('deployment.structure-cabling.index')->with(compact('data', 'buttons'));
    }
}
