@extends('partials.header')
    @section('content')
   
    <div class="table-listing-color m-3 p-3">
            
            <h2>Manage Brand</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item ">Brand</li>
                    </ol>
                </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <button class="btn btn-success" onclick="window.location.href='{{ route('product-brand.create') }}'" {{$buttons['Create']}}>+</button>
            </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="brand_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">brand Name</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $brand)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $brand->brand_name }} </td>
                                    <td> {{ ($brand->cds->toFormattedDateString()) }}</td> 
                                    <td> 
                                        <button class="btn {{$brand->status_color}}">
                                        {{ ($brand->status == 1) ? "Active":"Inactive" }}
                                        </button>
                                    </td>
                                    <td> 
                                        <a href="{{ route('product-brand.edit', $brand->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                            data-id="{{ $brand->id }}"
                                            data-status="{{ $brand->status }}"
                                            data-url="{{ route('product-brand.delete', $brand->id) }}" {{$buttons['Remove']}}>
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
            $('#brand_table').DataTable();
        } );
    </script>
@endsection