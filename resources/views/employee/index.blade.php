@extends('partials.header')
    @section('content')
        
    <div class="table-listing-color m-3 p-3">
                <div class="m-3">
                    <h2>Manage Employees</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Personnel</li>
                            <li class="breadcrumb-item ">Employee</li>
                        </ol>
                    </nav>
                    
                <div class="d-flex flex-row-reverse pb-3">      
                    <a href="{{ route('add-employee.create') }}"class="btn btn-success">+</a>
                </div> 

                    <div class="table-responsive">
                        <table class="table table-striped" id="employee_table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $employee)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $employee->emp_full_name }} </td>
                                    <td> {{ textShortener($employee->emp_full_address, $employee->id, 'emp_full_address', 25) }} </td>
                                    <td> {{ $employee->branch->branch_name }} </td>
                                    <td> {{ $employee->role->empr_role }} </td>
                                    <td> {{ $employee->emp_email }} </td>
                                    <td> {{ ($employee->cds->toFormattedDateString()) }}</td>
                                    <td> {{ ($employee->status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="/personnel/employee/{{$employee->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/personnel/employee/remove/{{$employee->id}}" title="Remove Data"
                                        class="btn btn-danger rounded">
                                            <i class="fas fa-trash text-light"></i>
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
            $('#employee_table').DataTable();
        } );
    </script>
@endsection