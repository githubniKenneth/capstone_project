@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
                
            <h2>Manage Unit Of Measurement</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Product</li>
                    <li class="breadcrumb-item ">Unit Of Measurement</li>
                </ol>
            </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <button class="btn btn-success" onclick="window.location.href='{{ route('product-uom.create') }}'" {{$buttons['Create']}}>+</button>
            </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="uom_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unite Of Measurement Name</th>
                                <th scope="col">Unite Of Measurement Shortname</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th> 
                            </tr>
                        </thead>
                        <tbody>    
                            @foreach ($data as $uom)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $uom->uom_name }} </td>
                                    <td> {{ $uom->uom_shortname }} </td>
                                    <td> {{ ($uom->cds->toFormattedDateString()) }}</td> 
                                    <td> {{ ($uom->status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="{{ route('product-uom.edit', $uom->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                            data-id="{{ $uom->id }}"
                                            data-status="{{ $uom->status }}"
                                            data-url="{{ route('product-uom.delete', $uom->id) }}" {{$buttons['Remove']}}>
                                            <i class="fas fa-trash text-light fa-lg"></i>
                                        </button>
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
            $('#uom_table').DataTable();
        } );
    </script>
@endsection