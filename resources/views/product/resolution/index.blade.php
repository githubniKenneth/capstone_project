@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
               
                <h2>Manage Resolution</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item ">Resolution</li>
                    </ol>
                </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <a href="{{ route('product-resolution.create') }}"class="btn btn-success">+</a>
            </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="resolution_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Resolution</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $resolution)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $resolution->resolution_desc }} </td>
                                    <td> {{ ($resolution->cds->toFormattedDateString()) }}</td> 
                                    <td> {{ ($resolution->status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="/product/resolution/{{$resolution->id}}" class="btn btn-warning rounded">
                                            <i class="fa-regular fa-pen-to-square text-light"></i>
                                        </a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/product/resolution/remove/{{$resolution->id}}" title="Remove Data"
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
            $('#resolution_table').DataTable();
        } );
    </script>
@endsection