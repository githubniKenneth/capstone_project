@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
               
                <h2>Manage Series</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item ">Series</li>
                    </ol>
                </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <a href="{{ route('product-series.create') }}"class="btn btn-success">+</a>
            </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="series_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Series Name</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $series)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $series->series_name }} </td>
                                    <td> {{ ($series->cds->toFormattedDateString()) }}</td> 
                                    <td> {{ ($series->status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="/product/series/{{$series->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/product/series/remove/{{$series->id}}" title="Remove Data"
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
            $('#series_table').DataTable();
        } );
    </script>
@endsection