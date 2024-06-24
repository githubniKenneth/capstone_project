@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
          
             <h2>Manage Job Order</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Deployment</li>
                        <li class="breadcrumb-item ">Job Order</li>
                    </ol>
                </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <a href="{{ route('job-order.create') }}"class="btn btn-success">+</a>
            </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="job-order_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Control Number</th>
                                <th scope="col">Client</th>
                                <th scope="col">Type</th>
                                <th scope="col">Landmark</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $job_order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td> {{ $job_order->jo_control_no }} </td>
                                <td> {{ $job_order->client->client_full_name }} </td>
                                <td> {{ $job_order->scope_of_work }} </td>
                                <td> {{ textShortener($job_order->jo_landmark, $job_order->id, 'jo_landmark', 25) }} </td>
                                <td> {{ $job_order->user->employee->emp_full_name }} </td>
                                <td> {{ ($job_order->cds->toFormattedDateString()) }}</td>
                                <td> {{ ($job_order->status == 1) ? "Active":"Inactive" }}</td>
                                <td> 
                                    <a href="/deployment/job-order/{{$job_order->id}}" title="Edit Data" class="btn btn-warning rounded">
                                        <i class="fa-regular fa-pen-to-square text-light"></i>
                                    </a>
                                    <a href="{{ route('job-order.email', $job_order->id) }} " title="Send Email" class="btn btn-success rounded"><i class="fa-regular fa-envelope text-light"></i></a>
                                    <a href="#" title="Print" class="btn btn-primary rounded">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                    <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/employee-role/remove/{{$job_order->id}}" title="Remove Data"
                                    class="btn btn-danger rounded">
                                        <i class="fas fa-trash text-light"></i>
                                    </a>
                                    <!-- <a href="#" class="btn btn-danger rounded">Delete</a> -->
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>    
    </div>    

        @if (Session::has('message'))
            <script>
                swal({
                    title: "Success!",
                    text: "{{ Session::get('message') }}",
                    icon: 'success',
                    timer: 2000,
                    buttons: false
                })
            </script>  
        @endif
    @endsection


@section('script')
    <script>
        $(document).ready( function () {
            $('#job-order_table').DataTable();
        } );
    </script>
@endsection