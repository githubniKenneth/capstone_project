<?php

namespace App\Http\Controllers\Deployment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Employee;
use App\Models\JobOrder;
use App\Models\JobOrderEmployee;
use App\Models\SalesOrder;
use App\Models\SalesOrderDetails;
use App\Models\ProductItem;
use App\Models\ProductResolution;
use App\Models\ProductBrand;
use App\Models\ProductPackages;
use App\Models\OnlinePayment;
use Carbon\Carbon;
use Mail;
use Auth;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Log;
use App\Helpers\PermissionHelper;

class JobOrderController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/job-order', 'Read');
        $buttons = PermissionHelper::getButtonStates('/deployment/job-order');
        $data_access = Auth::user()->data_access;
        $emp_id = Auth::user()->emp_id; //employee id of the user

        if ($data_access == 1)
        {
            $data = JobOrder::orderBy('created_at', 'desc')->get();
        }
        elseif ($data_access == 3)
        {
            $data = JobOrder::join('jo_employees', 'job_orders.id', '=', 'jo_employees.deployment_id')
              ->where('jo_employees.emp_id', $emp_id)
              ->where('jo_employees.deployment_type', 2)
              ->select('job_orders.*') 
              ->orderBy('job_orders.created_at', 'desc')
              ->get();
        }

        foreach ($data as $job_order){
            switch($job_order->scope_id){
                case 1:
                    $job_order->scope_of_work = 'New Installation';
                    break;
                case 2:
                    $job_order->scope_of_work = 'Additional/Upgrade';
                    break;
                case 3:
                    $job_order->scope_of_work = 'Structure Cabling';
                    break;
                case 4:
                    $job_order->scope_of_work = 'Rehabilitation/Repair';
                    break;
                default:
                    $job_order->scope_of_work = 'Unknown';
            }
        }

        foreach ($data as $status){
            $status->status_color = $status->status == 1 ? 'status-active' : 'status-inactive';
        }

        return view('job-order.index')->with(compact('data', 'buttons'));
    }

    public function create()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/job-order', 'Create');
        $scope_of_works = config('constant.scope_of_work');
        $clients = Client::orderBy('created_at', 'desc')->get();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $order_no = SalesOrder::orderBy('order_control_no', 'asc')->where('order_status', '1')->get();
        $packages = ProductPackages::orderBy('created_at', 'desc')->where('status', '1')->get();
        $products = ProductItem::orderBy('product_name', 'asc')->where('status', '1')->get();
        $brands = ProductBrand::orderBy('brand_name', 'asc')->where('status', '1')->get();
        $resolutions = ProductResolution::orderBy('resolution_desc', 'asc')->where('status', '1')->get();
        return view('job-order.create')->with(compact('scope_of_works','clients','employees', 'order_no', 'products','packages', 'brands', 'resolutions'));
    }

    public function store(Request $request)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/job-order', 'Create');
        $validatedData = $request->validate([
            'scope_id' => 'required',
            'jo_date' => 'required',
            'jo_turnover_date' => 'required',
            'client_id' => 'required',
            'order_id' => 'required',
            'name' => 'required',
        ], [
            'scope_id.required' => 'The Job Order Type field is required.',
            'jo_date.required' => 'The Date field is required.',
            'jo_turnover_date.required' => 'The Turn Over Date field is required.',
            'client_id.required' => 'The Client field is required.',
            'order_id.required' => 'The Order No. field is required.',
            'name.required' => 'Please select a Technician.',
        ]);

        $currentYear = Carbon::now()->year;
        $lastTwoDigits = substr($currentYear, -2);
        $last_job_order_number = JobOrder::selectRaw('CAST(jo_number AS INTEGER) as numeric_value')->whereYear('created_at', $currentYear)->orderBy('numeric_value', 'desc')->first();
        
        if ($last_job_order_number) {
            $newJobOrderNumber = str_pad($last_job_order_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newJobOrderNumber = '00001';
        }

        $newControlNo = "JO".$lastTwoDigits."-".$newJobOrderNumber;

        // dd($request);
        $job_order_details = array(
            "jo_number" => $newJobOrderNumber,
            "jo_control_no" => $newControlNo,
            "client_id" => $request->client_id,
            "order_id" => $request->order_id, 
            "scope_id" => $request->scope_id,
            "jo_landmark" => $request->jo_landmark,
            "jo_date" => $request->jo_date,
            "jo_turnover_date" => $request->jo_turnover_date,
            "status" => 1,
            "created_by" => Auth::user()->id,
            "updated_by" => 0,
        );
        $job_order = JobOrder::create($job_order_details);

        foreach ($request->name as $employee) {
            $jo_emp_details = array(
                "deployment_id" => $job_order->id,
                "emp_id" => $employee["emp_id"], 
                "deployment_type" => 2,
                "status" => 1,
                "created_by" => Auth::user()->id,
                "updated_by" => 0,
            );
            JobOrderEmployee::create($jo_emp_details);
        }

        // save to order_details table
        if($request->item){
            foreach ($request->item as $item) {
            
                $order_details = array(
                    "order_id" => $job_order->id,
                    "item_id" => $item["item_id"], 
                    "package_id" => $item["package_id"], 
                    "is_package" => $item["is_package"], 
                    "order_qty" => $item["order_qty"], 
                    "order_amount" => $item["order_amount"], 
                    "order_total_amount" => $item["order_total_amount"],
                    "created_by" => Auth::user()->id,
                    "updated_by" => 0,
                );
                SalesOrderDetails::create($order_details);
            }
        }
        

        return back()->with('message','Data has been saved successfully');
    }   

    public function showEmpDetails($id)
    {   
        $employee = Employee::with(['branch'])->find($id);
        return response()->json([
            'data' => $employee
        ]);
    }


    public function edit($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/job-order', 'Read');
        $data = JobOrder::findOrFail($id);
        $buttons = PermissionHelper::getButtonStates('/deployment/job-order');
        $clients = Client::orderBy('client_full_name', 'asc')->where('status','1')->get();
        $order_no = SalesOrder::orderBy('order_control_no', 'asc')->where('order_status', '1')->get();
        $order_payment = SalesOrder::where('id', $data->order_id)->first();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $scope_of_works = config('constant.scope_of_work');
        $order_details = SalesOrderDetails::with('item','package','item.uom')->where('order_id', $data->order_id)->get();
        $jo_employees = JobOrderEmployee::where('deployment_id', $id)->where('deployment_type', 2)->get();
        $payment_type = config('constant.payment_type');

        return view('job-order.edit')->with(compact('data', 'clients', 'scope_of_works', 'order_no', 'employees', 'order_details', 'jo_employees', 'order_payment', 'payment_type', 'buttons'));
    }
                    
    public function update(Request $request, JobOrder $id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/job-order', 'Update');
        $job_order_details = array(
            "client_id" => $request->client_id,
            "scope_id" => $request->scope_id,
            "order_id" => $request->order_id, 

        );
        $id->update($job_order_details);
        return redirect('/deployment/job-order');
    }

    public function removeTechnician($deployment_id, $emp_id, $deployment_type)
    {
        $technician = JobOrderEmployee::where('deployment_type', $deployment_type)
                                        ->where('deployment_id', $deployment_id)
                                        ->where('emp_id', $emp_id)
                                        ->first();

        $technician->delete();
        return redirect()->back();
    }
    
    public function sendEmail(JobOrder $id)
    {
        $jobOrder = JobOrder::where('id', $id->id)
                                ->where('order_id', $id->order_id)
                                ->first();
                                
        $ordered_items = SalesOrderDetails::where('order_id', $id->order_id)->get();
        // $quotation_items = SalesQuotationDetails::where('quotation_id', $id->id)->get();

        $data = array(
                        'job_order' => $jobOrder,
                        'ordered_items' => $ordered_items,
                    );
        Mail::send('mail.job-order', $data, function($message) use ($id) {
            $message->to($id->client->client_email, $id->client->client_full_name)->subject
                ('Citi Security Job Order');
            $message->from('citisecurity@test.com','Citi Security');
        });

        return back()->with('message','Email has been sent successfully');
    } 
    
    public function delete($id)
    {
        $is_authorized = PermissionHelper::checkAuthorization('/deployment/job-order', 'Remove');
        $job_order = JobOrder::find($id);

        if ($job_order) {
            $new_status = $job_order->status == 1 ? 0 : 1;
            $job_order->status = $new_status;

            if ($job_order->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }  
}
