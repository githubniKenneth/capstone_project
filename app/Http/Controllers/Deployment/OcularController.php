<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Employee;
use App\Models\JobOrderEmployee;
use App\Models\Ocular;
use Auth;
use Carbon\Carbon;
use Mail;
use App\Helpers\PermissionHelper;

class OcularController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/ocular', 'Read');
        $buttons = PermissionHelper::getButtonStates('/deployment/ocular');
        $data_access = Auth::user()->data_access;
        $emp_id = Auth::user()->emp_id; //employee id of the user

        if ($data_access == 1)
        {
            $data = Ocular::orderBy('created_at', 'desc')->get();
        }
        elseif ($data_access == 3)
        {
            $data = Ocular::join('jo_employees', 'dep_oculars.id', '=', 'jo_employees.deployment_id')
              ->where('jo_employees.emp_id', $emp_id)
              ->where('jo_employees.deployment_type', 1)
              ->select('dep_oculars.*') 
              ->orderBy('dep_oculars.created_at', 'desc')
              ->get();
        }

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }
        
        return view('deployment.ocular.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/ocular', 'Create');
        $clients = Client::orderBy('created_at', 'desc')->get();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $ocular_status = config('constant.ocular_status');
        return view('deployment.ocular.create')->with(compact('clients','employees','ocular_status'));
    }

    public function store(Request $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/ocular', 'Create');
        $validatedData = $request->validate([
            'client_id' => 'required',
            'ocular_date' => 'required',
            'status' => 'required',
            'name' => 'required',
        ], [
            'client_id.required' => 'The Client field is required.',
            'ocular_date.required' => 'The Date field is required.',
            'status.required' => 'The Status field is required.',
            'name.required' => 'Please select a Technician.',
        ]);

        // dd($request);
        $ocular_details = array(
            "client_id" => $request->client_id,
            "ocular_landmark" => $request->jo_landmark,
            "deployment_type" => 1,
            "ocular_date" => $request->ocular_date,
            "ocular_status" => $request->ocular_status,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $ocular = Ocular::create($ocular_details);

        if($request->name){
            foreach ($request->name as $employee) {
                $jo_emp_details = array(
                    "deployment_id" => $ocular->id,
                    "deployment_type" => 1,
                    "emp_id" => $employee["emp_id"], 
                    "status" => 1,
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                JobOrderEmployee::create($jo_emp_details);
            }
        }
        return back()->with('message','Data has been saved successfully');
    }   

    public function edit(Request $request, $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/ocular', 'Read');
        $data = Ocular::findOrFail($id);
        $buttons = PermissionHelper::getButtonStates('/deployment/ocular');
        $clients = Client::orderBy('created_at', 'desc')->get();
        $client_data = Client::where('id', $data->client_id)->first();
        $jo_employees = JobOrderEmployee::where('deployment_type', 1)->where('deployment_id', $id)->get();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $ocular_status = config('constant.ocular_status');
        return view('deployment.ocular.edit')->with(compact('clients','employees','data', 'client_data', 'jo_employees','ocular_status', 'buttons'));
    }

    public function update(Request $request, Ocular $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/ocular', 'Update');
        $ocular_details = array(
            "client_id" => $request->client_id,
            "ocular_landmark" => $request->jo_landmark,
            "deployment_type" => 1,
            "ocular_date" => $request->ocular_date,
            "ocular_status" => $request->ocular_status,
            "status" => 1,
            "updated_by" => Auth::user()->id,
        );
        
        $id->update($ocular_details);

        
        if($request->name){
            JobOrderEmployee::where('deployment_id', $id->id)
                        ->where('deployment_type', 1)
                        ->delete();

            foreach ($request->name as $employee) {
                $jo_emp_details = array(
                    "deployment_id" => $id->id,
                    "deployment_type" => 1,
                    "emp_id" => $employee["emp_id"], 
                    "status" => 1,
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                JobOrderEmployee::create($jo_emp_details);
            }
        }
        return redirect('/deployment/ocular');
    }

    public function showClientAddress($id)
    {   
        $client = Client::find($id);
        return response()->json([
            'data' => $client
        ]);
    }

    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/ocular', 'Remove');
        $ocular = Ocular::find($id);

        if ($ocular) {
            $new_status = $ocular->status == 1 ? 0 : 1;
            $ocular->status = $new_status;

            if ($ocular->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function sendEmail(Ocular $id)
    {
        
        
        $today = Carbon::today();
        $date_today = Carbon::now()->format('F d, Y');

        // Client Email
        $get_client = Client::findOrFail($id->client_id);
        $get_ocular_emp = Employee::select('employees.*')
                                ->join('jo_employees', 'employees.id', '=', 'jo_employees.emp_id')
                                ->where('jo_employees.deployment_type', 1)
                                ->where('jo_employees.deployment_id', $id->id)
                                ->get();
        $data = array(
            'ocular' => $id,
            'client' => $get_client,
            'employees' => $get_ocular_emp,
            'date' => $date_today,
        );
        Mail::send('mail.ocular-client', $data, function($message) use ($get_client) {
            $message->to($get_client->client_email, $get_client->client_full_name)->subject('Citi Security Ocular Schedule');
            $message->from('citisecurity@test.com','Citi Security');
        });
        
        // Employees Email
        
        foreach ($get_ocular_emp as $employee) {
            $data = array(
                'technician' => $employee,
                'ocular' => $id,
                'client' => $get_client,
                'employees' => $get_ocular_emp,
                'date' => $date_today,
            );
            Mail::send('mail.ocular-tech', $data, function($message) use ($employee) {
                $message->to($employee->emp_email, $employee->emp_full_name)->subject('Citi Security Ocular Schedule');
                $message->from('citisecurity@test.com','Citi Security');
            });
        }

        return back()->with('message','Email has been sent successfully');
        
    }
}
