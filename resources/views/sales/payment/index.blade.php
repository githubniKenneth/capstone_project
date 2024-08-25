@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
        
                    <h2>Manage Payments</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Sales</li>
                            <li class="breadcrumb-item ">Payments</li>
                        </ol>
                    </nav>
                    
                <div class="d-flex flex-row-reverse pb-3">
                    <!-- <a href="{{ route('sales-quotation.create') }}"class="btn btn-success">+</a> -->
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped" id="quotation_table">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Reference No.</th>
                                <th scope="col">Client</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Job Order No.</th>
                                <th scope="col">Branch</th>
                            </tr>
                        </thead>
                        @foreach ($data as $payment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td> {{ $payment->payment_control_no }} </td> 
                                <td> {{ $payment->client->client_full_name }} </td>
                                <td> {{ number_format($payment->total_amount, 2, '.', ',') }} </td>
                                <td> 
                                    <button class="btn {{$payment->payment_status == 1 ? 'status-done' : 'status-cancelled'}}">
                                        {{ $payment->payment_status == 1 ? "Success" : "Failed" }}
                                    </button>
                                </td>
                                <td> {{ $payment->job_order_id }}</td> 
                                <td> {{ $payment->branch->branch_name }}</td>  
                            </tr>
                        @endforeach
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
        $('#quotation_table').DataTable();
    } );
</script>
@endsection