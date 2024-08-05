@extends('partials.header')



@section('content')
<div class="row p-4">
    <div class="col-md-3 mb-5 {{ $dashboard_access['Total Clients'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Clients</h5>
                <p class="card-text">{{ $data['clientCount'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-5 {{ $dashboard_access['Quotations'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quotations Today</h5>
                <p class="card-text">{{ $data['quotationCount'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-5 {{ $dashboard_access['Orders'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Orders Today</h5>
                <p class="card-text"> {{ $data['orderCount'] }} </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-5 {{ $dashboard_access['Sales Value'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Sales</h5>
                <p class="card-text">&#8369; {{ $data['orderTotalSales'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-5 {{ $dashboard_access['Employees'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Employees</h5>
                <p class="card-text">{{ $data['employeeCount'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-5 {{ $dashboard_access['Oculars'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Oculars Today</h5>
                <p class="card-text">{{ $data['ocularCount']}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-5 {{ $dashboard_access['Job Orders'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Job Orders Today</h5>
                <p class="card-text">{{ $data['jobOrderCount']}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-5 {{ $dashboard_access['Pending Payment'] }}">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pending Payment</h5>
                <p class="card-text">&#8369; {{ $data['orderTotalPendingSales']}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row p-4">
    <h5 class="col-md-6 {{ $dashboard_access['Recent Deployments'] }}">Recent Deployments</h5>
    <h5 class="col-md-6 {{ $dashboard_access['Recent Sales'] }}">Recent Sales</h5>
</div>

<div class="row p-4">

    <div class="col-md-6 {{ $dashboard_access['Recent Deployments'] }}">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th class="col-md-4">Type</th>
                        <th class="col-md-5">Client</th>
                        <th class="col-md-3">Turn Over</th>
                    </thead>
                    <tbody>
                        @foreach ($data['recentDeployments'] as $deployment) 
                            <tr>
                                <td>{{$deployment->work_scope->scope_desc}}</td>
                                <td>{{$deployment->client->client_full_name}}</td>
                                <td>{{$deployment->TurnoverDate->toFormattedDateString()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 {{ $dashboard_access['Recent Sales'] }}">
        <div class="card">
            <div class="card-body">
                <table class="table">
                <thead>
                    <th class="col-md-5">Client</th>
                    <th class="col-md-3">Total Amount</th>
                    <th class="col-md-3">Payment Status</th>
                </thead>
                <tbody>
                    @foreach ($data['recentSales'] as $sales)
                        <tr>
                            <td>{{ $sales->client->client_full_name }}</td>
                            <td>&#8369; {{ $sales->order_total_amount }}</td>
                            <td>{{ $payment_status[$sales->id] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        
    </div>
</div>
@endsection