@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
        
                    <h2>Manage Orders</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Sales</li>
                            <li class="breadcrumb-item ">Orders</li>
                        </ol>
                    </nav>
                    
                <div class="d-flex flex-row-reverse pb-3">
                    <a href="{{ route('order.create') }}"class="btn btn-success">+</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped" id="order_table">
                        <thead >
                            <tr>
                            <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Order No.</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Posting Status</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $order)
                                @php
                                    $payment_type = ''; // Declare the variable before the switch block
                                @endphp
                                @switch($order->payment_type)
                                    @case(1)
                                        @php $payment_type = 'Cash'; @endphp
                                        @break
                                    @case(2)
                                        @php $payment_type = 'Online'; @endphp
                                        @break
                                    @case(3)
                                        @php $payment_type = 'Check'; @endphp
                                        @break
                                @endswitch

                                @php
                                    $payment_status = ''; // Declare the variable before the switch block
                                @endphp
                                @switch($order->payment_status)
                                    @case(0)
                                        @php $payment_status = 'Pending'; @endphp
                                        @break
                                    @case(1)
                                        @php $payment_status = 'Paid'; @endphp
                                        @break
                                    @case(2)
                                        @php $payment_status = 'Check Pending'; @endphp
                                        @break
                                @endswitch
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ ($order->cds->toFormattedDateString()) }}</td>
                                    <td>{{ $order->order_control_no }}</td>
                                    <td>{{ $order->branch->branch_name }}</td>
                                    <td>{{ $order->client->client_full_name }}</td>
                                    <td>{{ $order->order_total_amount }}</td>
                                    <td>{{ $payment_type }}</td>
                                    <td>{{ $payment_status }}</td>
                                    <td>{{ $order->user->employee->emp_full_name }}</td>
                                    <td>{{ ($order->is_posted == 1) ? "Posted":"Drafted" }}</td>
                                    <td>{{ ($order->order_status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="{{ route('sales-order.edit', $order->id) }} " class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a href="# " title="Send Email with Payment" class="btn btn-success rounded"><i class="fa-regular fa-envelope text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/sales/order/remove/{{$order->id}}" title="Remove Data" 
                                        class="btn btn-danger rounded">
                                            <i class="fas fa-trash text-light fa-lg"></i>
                                        </a>
                                        <!-- <a href="#" class="btn btn-danger rounded">Delete</a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- remove modal -->
            <x-remove-modal/>
            <script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
            <!-- remove modal -->
       
    @endsection
        
@section('script')
    <script>
        $(document).ready( function () {
            $('#order_table').DataTable();
        } );
    </script>
@endsection