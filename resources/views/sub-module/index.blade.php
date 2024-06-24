@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
                
                <h2>Manage Module</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Components</li>
                            <li class="breadcrumb-item ">Module</li>
                        </ol>
                    </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <a href="{{ route('module.create') }}"class="btn btn-success">+</a>
            </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="sub-module_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Module</th>
                                <th scope="col">Code</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $module)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $module->module_name }} </td>
                                    <td> {{ $module->module_code }} </td>
                                    <td> {{ $module->module_icon }} </td>
                                    <td> {{ textShortener($module->module_description, $module->id,'module_description', 25) }} </td>
                                    <td> {{ ($module->cds->toFormattedDateString()) }}</td>
                                    <td> {{ ($module->status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="/add-employee-role/{{$module->id}}" class="btn btn-warning rounded">
                                            <i class="fa-regular fa-pen-to-square text-light"></i>
                                        </a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/employee-role/remove/{{$module->id}}" title="Remove Data"
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
    </div>      
    @endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#sub-module_table').DataTable();
        } );
    </script>
@endsection