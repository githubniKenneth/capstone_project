<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlinePayment;
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
use App\Helpers\PermissionHelper;

class PaymentController extends Controller
{
    public function index()
    {
        $is_authorized = PermissionHelper::checkAuthorization('/sales/payment', 'Read');
        $data_access = Auth::user()->data_access;
        $branch_id =Auth::user()->employee->branch_id; 
        if ($data_access == 1)
        {
            $data = OnlinePayment::orderBy('created_at', 'desc')->get();
        }
        elseif ($data_access == 2)
        {
            $data = OnlinePayment::orderBy('created_at', 'desc')->where('branch_id', $branch_id)->get(); 
        } 

        return view('sales.payment.index')->with(compact('data'));
    }

    public function edit($id)
    { 
        $data = OnlinePayment::findOrFail($id); 

        return view('sales.payment.edit')->with(compact('data'));
    }

    public function paymentFailed(JobOrder $id)
    {
        $generate_number = $this->onlinePaymentControlNo();
        $newNumber = $generate_number['newNumber'];
        $newControlNo = $generate_number['newControlNo'];

        $online_payment_details = array(
            "client_id" => $id->client_id,
            "payment_number" => $newNumber,
            "payment_control_no" => $newControlNo,
            "job_order_id" => $id->jo_control_no,
            "total_amount" => $id->orders->order_total_amount,
            "branch_id" => $id->orders->order_branch_id,
            "payment_status" => 0, 

        );
        OnlinePayment::create($online_payment_details);

        $data = array(
            'job_order' => $id,
            'reference_no' => $newControlNo,
            'amount' => $id->orders->order_total_amount,
            'payment_status' => 'Failed',
        );

        Mail::send('mail.online-payment', $data, function($message) use ($id) {
        $message->to($id->client->client_email, $id->client->client_full_name)->subject
            ('Citi Security Online Payment');
        $message->from('citisecurity@test.com','Citi Security');
        });

        return "Payment Failed";
    }

    public function paymentSuccess(JobOrder $id)
    {
        
        SalesOrder::where('id', $id->order_id)->update([
            "payment_type" => 2,
            "payment_status" => 1,
        ]);

        $generate_number = $this->onlinePaymentControlNo();
        $newNumber = $generate_number['newNumber'];
        $newControlNo = $generate_number['newControlNo'];

        $online_payment_details = array(
            "client_id" => $id->client_id,
            "payment_number" => $newNumber,
            "payment_control_no" => $newControlNo,
            "job_order_id" => $id->jo_control_no,
            "total_amount" => $id->orders->order_total_amount,
            "branch_id" => $id->orders->order_branch_id,
            "payment_status" => 1, 

        );
        OnlinePayment::create($online_payment_details);

        $data = array(
            'job_order' => $id,
            'reference_no' => $newControlNo,
            'amount' => $id->orders->order_total_amount,
            'payment_status' => 'Successful',
        );

        Mail::send('mail.online-payment', $data, function($message) use ($id) {
        $message->to($id->client->client_email, $id->client->client_full_name)->subject
            ('Citi Security Online Payment');
        $message->from('citisecurity@test.com','Citi Security');
        });

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
                            'failed' => route('job-order.failed', ['id' => $id]),
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
     
    public function onlinePaymentControlNo()
    {
        $currentYear = Carbon::now()->year;
        $lastTwoDigits = substr($currentYear, -2);
        $last_number = OnlinePayment::selectRaw('CAST(payment_number AS INTEGER) as numeric_value')->whereYear('created_at', $currentYear)->orderBy('numeric_value', 'desc')->first();
        
        if ($last_number) {
            $newNumber = str_pad($last_number->numeric_value + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '00001';
        }

        $newControlNo = "OP".$lastTwoDigits."-".$newNumber;

        return [
            'newNumber' => $newNumber,
            'newControlNo' => $newControlNo,
        ];
    }
}
