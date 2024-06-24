@extends('partials.header')
    @section('content')

<div class="table-listing-color m-3 p-3">

        <h2>Manage Items</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item ">Product</li>
                <li class="breadcrumb-item ">Item</li>
            </ol>
        </nav>
        
    <div class="d-flex flex-row-reverse pb-3">
        <a href="{{ route('product-item.create') }}"class="btn btn-success">+</a>
    </div>

            <div class="table-responsive">
                <table class="table table-striped" id="item_table">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Brand</th>
                            <th scope="cole">Category</th>
                            <th scope="cole">Series</th>
                            <th scope="cole">Resolution</th>
                            <th scope="col">Price</th>
                            <th scope="col">UOM</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                
                                <td>{{$loop->iteration}}</td>
                                <td> {{ $item->item_type }} </td>
                                <td> {{ $item->product_name }} </td>
                                <td> {{ $item->brand_name }} </td>
                                <td>{{optional($item->category)->category_name}}</td>
                                <td>{{optional($item->series)->series_name}}</td>
                                <td>{{optional($item->resolution)->resolution_desc}}</td>
                                <td> {{ $item->product_price }} </td>
                                <td>{{optional($item->uom)->uom_shortname}}</td>                                
                                <td> {{ $item->product_desc }} </td>
                                <td>
                                    @if ($item->file_path)
                                        <img src="{{ asset('storage/uploads/itemImages/' . basename($item->file_path)) }}" alt="Product Image" style="max-width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </td>                               
                                <td> {{ ($item->cds->toFormattedDateString()) }}</td>
                                <td> {{ ($item->status == 1) ? "Active":"Inactive" }}</td>
                                <td> 
                                    <a href="/product/item/{{$item->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                    
                                    <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/product/item/remove/{{$item->id}}" title="Remove Data" 
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

        <!-- remove modal -->
        <x-remove-modal/>
        <script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
        <!-- remove modal -->
    @endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#item_table').DataTable();
        } );
    </script>


@endsection
