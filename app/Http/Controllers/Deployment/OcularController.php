<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Employee;
use App\Models\JobOrderEmployee;
use App\Models\Ocular;
use Auth;
class OcularController extends Controller
{
    public function index()
    {
        $data = Ocular::orderBy('created_at', 'desc')->get();
        return view('deployment.ocular.index')->with(compact('data'));
    }

    public function create()
    {
        $clients = Client::orderBy('created_at', 'desc')->get();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $ocular_status = config('constant.ocular_status');
        return view('deployment.ocular.create')->with(compact('clients','employees','ocular_status'));
    }

    public function store(Request $request)
    {
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
        $data = Ocular::findOrFail($id);

        $clients = Client::orderBy('created_at', 'desc')->get();
        $client_data = Client::where('id', $data->client_id)->first();
        $jo_employees = JobOrderEmployee::where('deployment_type', 1)->where('deployment_id', $id)->get();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $ocular_status = config('constant.ocular_status');
        return view('deployment.ocular.edit')->with(compact('clients','employees','data', 'client_data', 'jo_employees','ocular_status'));
    }

    public function update(Request $request, Ocular $id)
    {
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

}
