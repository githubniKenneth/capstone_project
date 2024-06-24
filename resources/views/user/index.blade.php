@extends('partials.header')
    @section('content')
    <div class="table-listing-color m-3 p-3">
        <h2>Manage User</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">User Account</li>
                    <li class="breadcrumb-item ">User</li>
                </ol>
            </nav>
            
        <div class="d-flex flex-row-reverse pb-3">
            <a href="{{ route('user.create') }}"class="btn btn-success">Add</a>
        </div>
                
        <div class="table-responsive">
            <table class="table table-striped" id="user_table">
                <thead >
                    <tr>
                    <th scope="col">No.</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)

                        @php
                            $full_name = ($user->emp_id == 0) ? 'Guest' : $user->employee->emp_full_name;
                        @endphp

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{ $full_name }}</td>
                            <td> {{ $user->username}}</td>
                            <td> {{ $user->email}}</td>
                            <td> {{ ($user->cds->toFormattedDateString()) }}</td>
                            <td> {{ $user->creator->emp_full_name }} </td>
                            <td> {{ ($user->status == 1) ? "Active":"Inactive" }}</td>
                            <td> 
                                <a href="{{ route('user.edit', $user->id) }} " class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/sales/user/remove/{{$user->id}}" title="Remove Data" 
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
    @endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#user_table').DataTable();
        } );
    </script>
@endsection