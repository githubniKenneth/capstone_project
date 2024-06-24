<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\SalesQuotation;
use App\Models\SalesOrder;
use App\Models\Employee;
use App\Models\Ocular;
use App\Models\JobOrder;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $data = [
            
            'clientCount' => Client::count(),
            'quotationCount' => SalesQuotation::whereDate('created_at', $today)->where('status', 1)->count(),
            'orderCount' => SalesOrder::whereDate('created_at', $today)->where('order_status', 1)->count(),
            'orderTotalSales' => SalesOrder::where('payment_status', 1)->where('order_status', 1)->sum('order_total_amount'),
            'orderTotalPendingSales' => SalesOrder::whereIn('payment_status', [0, 2])->where('order_status', 1)->sum('order_total_amount'),
            'employeeCount' => Employee::where('status', 1)->count(),
            'ocularCount' => Ocular::whereDate('created_at', $today)->where('status', 1)->count(),
            'jobOrderCount' => JobOrder::whereDate('created_at', $today)->where('status', 1)->count(),

            'recentDeployments' => JobOrder::OrderBy('created_at', 'DESC')
            ->where('status', 1)
            ->limit(5)
            ->get(),
            
            'recentSales' => SalesOrder::OrderBy('created_at', 'DESC')
            ->where('order_status', 1)
            ->limit(5)
            ->get(),
            

        ];
        
        $payment_status = [];

        foreach ($data['recentSales'] as $sales_payment){
            switch($sales_payment->payment_status){
                case 0:
                $payment_status[$sales_payment->id] = 'Payment Pending';
                break;
            case 1:
                $payment_status[$sales_payment->id] = 'Paid';
                break;
            case 2:
                $payment_status[$sales_payment->id] = 'Check Pending';
                break;
            default:
                $payment_status[$sales_payment->id] = 'Unknown';
                break;

            }
        }

        return view('dashboard')->with(compact('data', 'payment_status'));
    }
}
