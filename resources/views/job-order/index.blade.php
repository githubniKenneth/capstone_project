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
                <button class="btn btn-success" onclick="window.location.href='{{ route('job-order.create') }}'" {{$buttons['Create']}}>+</button>
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
                                <td> 
                                    <button class="btn {{$job_order->status_color}}">
                                    {{ ($job_order->status == 1) ? "Active":"Inactive" }}
                                    </button>
                                </td>
                                <td> 
                                    <a href="{{ route('job-order.edit', $job_order->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                    <button class="btn btn-success rounded" onclick="window.location.href='{{ route('job-order.email', $job_order->id) }}'" title="Send Email"><i class="fa-regular fa-envelope text-light"></i></button>
                                    <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                        data-id="{{ $job_order->id }}"
                                        data-status="{{ $job_order->status }}"
                                        data-url="{{ route('job-order.delete', $job_order->id) }}" {{$buttons['Remove']}}>
                                        <i class="fas fa-trash text-light fa-lg"></i>
                                    </button>
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
    <script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
@endsection