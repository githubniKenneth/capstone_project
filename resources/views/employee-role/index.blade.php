@extends('partials.header')
    @section('content')
    
    <div class="table-listing-color m-3 p-3">

         <h2>Manage Employee Roles</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Personnel</li>
                    <li class="breadcrumb-item ">Employee Roles</li>
                </ol>
            </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <a href="{{ route('add-employee-role.create') }}"class="btn btn-success">Add</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm" id="employee-role_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Role Description</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $role)
                            <tr>


                                <td> {{$loop->iteration}} </td>
                                <td> {{ $role->empr_role}} </td>
                                <td> {{ textShortener($role->empr_desc, $role->id, 'empr_desc', 25) }} </td>
                                <td> {{ ($role->cds->toFormattedDateString()) }}</td>
                                <td> {{ ($role->status == 1) ? "Active":"Inactive" }}</td>

                                <td> 
                                    <a href="/personnel/employee-role/{{$role->id}}" class="btn btn-warning rounded">
                                        <i class="fa-regular fa-pen-to-square text-light"></i>
                                    </a>
                                    <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/personnel/employee-role/remove/{{$role->id}}" title="Remove Data"
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
    </div>
    @endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#employee-role_table').DataTable();
        } );
    </script>
@endsection

@extends('partials.footer')
