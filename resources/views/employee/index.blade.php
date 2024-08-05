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
                    <button class="btn btn-success" onclick="window.location.href='{{ route('add-employee.create') }}'" {{$buttons['Create']}}>+</button>
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
                                    <td> 
                                        <button class="btn {{$employee->status_color}}">
                                        {{ ($employee->status == 1) ? "Active":"Inactive" }}
                                        </button>
                                    </td>
                                    <td> 
                                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                            data-id="{{ $employee->id }}"
                                            data-status="{{ $employee->status }}"
                                            data-url="{{ route('employee.delete', $employee->id) }}" {{$buttons['Remove']}}>
                                            <i class="fas fa-trash text-light fa-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
    @endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#employee_table').DataTable();
        } );
    </script>
@endsection