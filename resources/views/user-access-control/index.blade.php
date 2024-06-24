@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <!-- <div class="d-flex justify-content-between"> -->
                <div class="div">
                    <h2>Manage User Access Control</h2>
                </div>
                    
                <div class="d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Component</li>
                            <li class="breadcrumb-item ">Access Control</li>
                        </ol>
                    </nav>
                    <a href="{{ route('add-branch') }}"class="btn btn-success">Add</a>
                </div>
            <!-- </div> -->
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Branch Name</th>
                        <th scope="col">Full Address</th>
                        <th scope="col">Telephone No.</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    @foreach ($data as $branch)
                        <tr>
                            
                            <td>{{$loop->iteration}}</td>
                            <td> {{ $branch->branch_name }} </td>
                            <td> {{ $branch->branch_city }} </td>
                            <td> {{ $branch->branch_tele_no }} </td>
                            <td> {{ $branch->branch_phone_no }} </td>
                            <td> {{ $branch->branch_email }} </td>
                            <td> {{ ($branch->cds->toFormattedDateString()) }}</td>
                            <td> {{ ($branch->branch_status == 1) ? "Active":"Inactive" }}</td>
                            <td> 
                                <a href="/branch/{{$branch->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/branch/remove/{{$branch->id}}" title="Remove Data" 
                                class="btn btn-danger rounded">
                                    <i class="fas fa-trash text-light fa-lg"></i>
                                </a>
                                <!-- <a href="#" class="btn btn-danger rounded">Delete</a> -->
                            </td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
            <!-- remove modal -->
            <x-remove-modal/>
            <script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
            <!-- remove modal -->
        </div>
    @endsection