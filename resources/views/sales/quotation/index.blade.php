@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
        
                    <h2>Manage Quotations</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Sales</li>
                            <li class="breadcrumb-item ">Quotation</li>
                        </ol>
                    </nav>
                    
                <div class="d-flex flex-row-reverse pb-3">
                    <a href="{{ route('sales-quotation.create') }}"class="btn btn-success">+</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped" id="quotation_table">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Quotation No.</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Requestor</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $Quotation)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ ($Quotation->cds->toFormattedDateString()) }}</td>
                                    <td>{{ $Quotation->quote_control_number }}</td>
                                    <td>{{ $Quotation->branch->branch_name }}</td>
                                    <td>{{ $Quotation->quote_name }}</td>
                                    <td>{{ $Quotation->quote_email }}</td>
                                    <td>{{ ($Quotation->is_request == 0) ? "Admin Side":"Client Side"   }}</td>
                                    <td>{{ $Quotation->user->employee->emp_full_name }}</td>
                                    <td> {{ ($Quotation->status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="{{ route('sales-quotation.edit', $Quotation->id) }} " title="Edit Data" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a href="{{ route('sales-quotation.email', $Quotation->id) }} " title="Send Email" class="btn btn-success rounded"><i class="fa-regular fa-envelope text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/sales/quotation/remove/{{$Quotation->id}}" title="Remove Data" 
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
                $('#quotation_table').DataTable();
            } );
        </script>
    @endsection