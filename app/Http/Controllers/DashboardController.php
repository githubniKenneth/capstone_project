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
use App\Models\User;
use App\Models\DashboardAccess;
use App\Http\Requests\ProfileStoreRequest;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $role_id = Auth::user()->role_id;
        $emp_id = Auth::user()->emp_id;
        $data_access = Auth::user()->data_access;
        $user_branch = Auth::user()->employee->branch_id; 
        $today = Carbon::today();
        
        // Check if display is allowed
        $dashboard_access = $this->checkDisplay($role_id);

        if ($data_access == 1)
        {
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
        }
        elseif ($data_access == 2)
        {
            $data = [
            
                'clientCount' => Client::count(),
                'quotationCount' => SalesQuotation::where('branch_id', $user_branch)->whereDate('created_at', $today)->where('status', 1)->count(),
                'orderCount' => SalesOrder::where('branch_id', $user_branch)->whereDate('created_at', $today)->where('order_status', 1)->count(),
                'orderTotalSales' => SalesOrder::where('branch_id', $user_branch)->where('payment_status', 1)->where('order_status', 1)->sum('order_total_amount'),
                'orderTotalPendingSales' => SalesOrder::where('branch_id', $user_branch)->whereIn('payment_status', [0, 2])->where('order_status', 1)->sum('order_total_amount'),
                'employeeCount' => Employee::where('branch_id', $user_branch)->where('status', 1)->count(),
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
        }
        elseif ($data_access == 3) // mostly for Technicians
        {
            $data = [
                'clientCount' => Client::count(),
                'quotationCount' => SalesQuotation::whereDate('created_at', $today)->where('status', 1)->count(),
                'orderCount' => SalesOrder::whereDate('created_at', $today)->where('order_status', 1)->count(),
                'orderTotalSales' => SalesOrder::where('payment_status', 1)->where('order_status', 1)->sum('order_total_amount'),
                'orderTotalPendingSales' => SalesOrder::whereIn('payment_status', [0, 2])->where('order_status', 1)->sum('order_total_amount'),
                'employeeCount' => Employee::where('status', 1)->count(),
                'ocularCount' => Ocular::join('jo_employees', 'dep_oculars.id', '=', 'jo_employees.deployment_id')
                                ->where('jo_employees.emp_id', $emp_id)
                                ->where('jo_employees.deployment_type', 1)
                                ->whereDate('dep_oculars.created_at', $today)
                                ->where('dep_oculars.status', 1)
                                ->count(),

                'jobOrderCount' => JobOrder::join('jo_employees', 'job_orders.id', '=', 'jo_employees.deployment_id')
                                    ->where('jo_employees.emp_id', $emp_id)
                                    ->where('jo_employees.deployment_type', 2)
                                    ->whereDate('job_orders.created_at', $today)
                                    ->where('job_orders.status', 1)
                                    ->count(),
    
                'recentDeployments' => JobOrder::join('jo_employees', 'job_orders.id', '=', 'jo_employees.deployment_id')
                ->where('jo_employees.emp_id', $emp_id)
                ->OrderBy('job_orders.created_at', 'DESC')
                ->where('job_orders.status', 1)
                ->limit(5)
                ->get(),
                
                'recentSales' => SalesOrder::OrderBy('created_at', 'DESC')
                ->where('order_status', 1)
                ->limit(5)
                ->get(),
                
    
            ];
        }
        
        
        
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

        return view('dashboard')->with(compact('data', 'payment_status', 'dashboard_access'));
    }

    public function editProfile()
    {
        $user_id = Auth::user()->id;
        $data = User::where('id', $user_id)->first();
        $employee = Employee::where('id', $user_id)->first();
        return view('profile.edit')->with(compact('data', 'employee'));
    }

    public function update(ProfileStoreRequest $request)
    {
        $validated = $request->validated();
        $user_id = Auth::user()->id;
        if ($request->filled('password')) {
            $password = bcrypt($request->password);
            $user_details = array(
                "password" => $password,
                "email" => $request->emp_email,
            );

            User::where('id', $user_id)->update($user_details);
        } 
        
        $full_address = $request->emp_lot_no.' '.$request->emp_street.' '.$request->emp_brgy.', '.$request->emp_city;
        $employee = User::select('emp_id')->where('id', $user_id)->first();
        $employee_details = array(
            "emp_lot_no" => $request->emp_lot_no,
            "emp_street" => $request->emp_street,
            "emp_brgy" => $request->emp_brgy,
            "emp_city" => $request->emp_city,
            "emp_full_address" => $full_address,
            "emp_tele_no" => $request->emp_tele_no,
            "emp_phone_no" => $request->emp_phone_no,
            "emp_email" => $request->emp_email,
            "updated_by" => Auth::user()->id,
        );
        Employee::where('id', $employee->emp_id)->update($employee_details);

        return back()->with('message','Data has been updated successfully');
    }

    public function checkDisplay($role_id)
    {   
        // User::where('id', $user_id);
        // $dashboard_access = DashboardAccess::where('role_id', $role_id)->pluck('dashboard_id')->toArray();
        // return $dashboard_access;

        $dashboard_items = config('constant.dashboard');
        $dashboard_access_ids = DashboardAccess::where('role_id', $role_id)->pluck('dashboard_id')->toArray();

        // Create an associative array to map dashboard items to '' or 'd-none'
        $dashboard_access = [];

        foreach ($dashboard_items as $id => $description) {
            $dashboard_access[$description] = in_array($id, $dashboard_access_ids) ? '' : 'd-none';
        }
        return $dashboard_access;
        
        // Define the dashboard items
        // $dashboard_items = [
        //     '1' => 'Total Clients',
        //     '2' => 'Quotations',
        //     '3' => 'Orders',
        //     '4' => 'Sales Value',
        //     '5' => 'Employees',
        //     '6' => 'Oculars',
        //     '7' => 'Job Orders',
        //     '8' => 'Pending Payment',
        //     '9' => 'Recent Deployments',
        //     '10' => 'Recent Sales',
        // ];
    }
}
