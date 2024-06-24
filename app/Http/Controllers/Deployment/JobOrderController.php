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
use Carbon\Carbon;
use Mail;
use Auth;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Log;
class JobOrderController extends Controller
{
    public function index()
    {
        $data = JobOrder::orderBy('created_at', 'desc')->get();
        // dd($data);
        // return view('students.index', $data);

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

        return view('job-order.index')->with(compact('data'));
        // return view('job-order.index');
    }

    public function create()
    {
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
        $data = JobOrder::findOrFail($id);
        
        $clients = Client::orderBy('client_full_name', 'asc')->where('status','1')->get();
        $order_no = SalesOrder::orderBy('order_control_no', 'asc')->where('order_status', '1')->get();
        $order_payment = SalesOrder::where('id', $data->order_id)->first();
        $employees = Employee::orderBy('created_at', 'desc')->get();
        $scope_of_works = config('constant.scope_of_work');
        $order_details = SalesOrderDetails::with('item','package','item.uom')->where('order_id', $data->order_id)->get();
        $jo_employees = JobOrderEmployee::where('deployment_id', $id)->where('deployment_type', 2)->get();
        $payment_type = config('constant.payment_type');

        return view('job-order.edit')->with(compact('data', 'clients', 'scope_of_works', 'order_no', 'employees', 'order_details', 'jo_employees', 'order_payment', 'payment_type'));
    }
                    
    public function update(Request $request, JobOrder $id)
    {
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
        // $quotation_items = SalesQuotationDetails::where('quotation_id', $id->id)->get();

        $data = array(
                        'job_order' => $jobOrder,
                    );
        Mail::send('mail.job-order', $data, function($message) use ($id) {
            $message->to($id->client->client_email, $id->client->client_full_name)->subject
                ('Citi Security Job Order');
            $message->from('citisecurity@test.com','Citi Security');
        });

        return back()->with('message','Email has been sent successfully');
    }

    public function paymentFailed()
    {
        return "Payment Failed";
    }

    public function paymentSuccess(JobOrder $id)
    {
        $job_order_details = array(
            "payment_type" => 2,
            "payment_status" => 1,
        );
        $id->update($job_order_details);
        return "Payment Success";
    }

    public function gcash($id)
    {
        $client = new GuzzleClient();
        $data = JobOrder::findOrFail($id);
        $secret_key = env('PAYMONGO_SECRET_KEY');
        $order_amount = $data->orders->order_total_amount;
        $numberString = number_format($order_amount, 2, '.', '');
        $convertedNumber = str_replace('.', '', $numberString);
        $amount = (int)$convertedNumber;

        $response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [
            'body' => json_encode([
                'data' => [
                    'attributes' => [
                        'amount' => $amount,
                        'redirect' => [
                            'failed' => route('job-order.failed'),
                            'success' => route('job-order.success', ['id' => $id]),
                        ],
                        'type' => 'gcash',
                        'currency' => 'PHP'
                    ]
                ]
            ]),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic '. $secret_key,
                'content-type' => 'application/json',
            ],
        ]);

        // echo $response->getBody();
        $data = json_decode($response->getBody(), true);
    
        $redirect = $data['data']['attributes']['redirect']['checkout_url'];
        echo "Redirecting in 3 seconds..";
        header('Refresh: 3;URL='. $redirect);

        // return response()->json(json_decode($response->getBody(), true), 200);
        // return $response->getBody();
    }

    public function webhook()
    {
        $secret_key = env('PAYMONGO_SECRET_KEY');
        header('Content-Type: application/json');
        $request = file_get_contents('php://input');
        $payload = json_decode($request, true);
        $type = $payload['data']['attributes']['type'];

        //If event type is source.chargeable, call the createPayment API
        if ($type == 'source.chargeable') {
        $amount = $payload['data']['attributes']['data']['attributes']['amount'];
        $id = $payload['data']['attributes']['data']['id'];
        $description = "GCash Payment Description";
        $curl = curl_init();
        $fields = array("data" => array ("attributes" => array ("amount" => $amount, "source" => array ("id" => $id, "type" => "source"), "currency" => "PHP", "description" => $description)));
        $jsonFields = json_encode($fields);
            
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paymongo.com/v1/payments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $jsonFields,
            CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            //Input your encoded API keys below for authorization
            "Authorization: 'Basic '. $secret_key" ,
            "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        //Log the response
        $fp = file_put_contents( 'test.log', $response );
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            //Log the response
            $fp = file_put_contents( 'test.log', $err );
        } else {
            echo $response;
        }
        }
    }
}
