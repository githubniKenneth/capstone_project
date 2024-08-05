<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Helpers\PermissionHelper;

class ClientController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/client/', 'Read'); 
        $buttons = PermissionHelper::getButtonStates('/client/');
        $data = Client::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);


        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }

        return view('client.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {	
        $is_authorized = PermissionHelper::checkAuthorization('/client/', 'Create');
        return view('client.create');
    }

    public function store(ClientStoreRequest $request)
    {	
        $is_authorized = PermissionHelper::checkAuthorization('/client/', 'Create');
        $validated = $request->validated();
        
        $full_address = implode(" ", array_filter([$request->client_lot_no, $request->client_street, $request->client_brgy, $request->client_city]));

        $client_full_name = implode(" ", array_filter([$request->client_first_name, $request->client_middle_name, $request->client_last_name, $request->client_suffix]));

        $details = array(
            "client_business_name" => $request->client_business_name,
            "client_first_name" => $request->client_first_name,
            "client_middle_name" => $request->client_middle_name, 
            "client_last_name" => $request->client_last_name, 
            "client_suffix" => $request->client_suffix, 
            "client_full_name" => $client_full_name, 
            "client_lot_no" => $request->client_lot_no,
            "client_street" => $request->client_street,
            "client_brgy" => $request->client_brgy,
            "client_city" => $request->client_city,
            "client_full_address" => $full_address,
            "client_mobile_no" => $request->client_mobile_no,
            "client_tele_no" => $request->client_tele_no,
            "client_email" => $request->client_email,
            "status" => $request->status,
            "created_by" => $request->created_by,
            "updated_by" => $request->updated_by,
        );
        Client::create($details);
        return back()->with('message','Data has been saved successfully');
    }

    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/client/', 'Read');
        $data = Client::findOrFail($id);
        return view('client.edit', ['client' => $data]);
    }

    public function update(ClientStoreRequest $request, Client $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/client/', 'Update');
        $validated = $request->validated();
        $details = array(
            "client_business_name" => $request->client_business_name,
            "client_first_name" => $request->client_first_name,
            "client_middle_name" => $request->client_middle_name,
            "client_last_name" => $request->client_last_name,
            "client_full_name" => $request->client_full_name,
            "client_suffix" => $request->client_suffix,
            "client_lot_no" => $request->client_lot_no,
            "client_street" => $request->client_street,
            "client_brgy" => $request->client_brgy,
            "client_city" => $request->client_city,
            "client_mobile_no" => $request->client_mobile_no,
            "client_tele_no" => $request->client_tele_no,
            "client_email" => $request->client_email,       
            "status" => 1,    
            "created_by" => 1,
            "updated_by" => 1,
        );
        $id->update($details);
        return back()->with('message','Data has been updated successfully');
    }

    public function delete(Client $client, $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/client/', 'Remove');
        $current_status = Client::find($id, ['status']);
        $new_status = ($current_status->status == "1") ? "0" : "1";
        $update = array(
            "status" => $new_status,
        );
        $client->where('id', $id)->update($update);
        return redirect('/client'); // kulang yung slug
    }
}
