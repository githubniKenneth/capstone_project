@extends('partials.header')
@section('content')

<div class="table-listing-color m-3 p-3">

            <h2>Manage Stocks</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Inventory</li>
                    <li class="breadcrumb-item ">Stocks</li>
                </ol>
            </nav>
     
            <div class="table-responsive">
                <table class="table table-striped" id="stocksTable">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Issued Qty</th>
                            <th scope="col">Ordered Qty</th>
                            <th scope="col">Sold Qty</th>
                            <th scope="col">Adjusted Qty</th>
                            <th scope="col">Balance Qty</th>
                            <!-- <th scope="col">Status</th> -->
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $stocks)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{ $stocks->item->product_name }} </td>
                            <td> {{ $stocks->issued_qty }} </td>
                            <td> {{ $stocks->ordered_qty }} </td>
                            <td> {{ $stocks->sold_qty }} </td>
                            <td> {{ $stocks->adjusted_qty }} </td>
                            <td> {{ $stocks->balance_qty }} </td>
                            <!-- <td> {{ $stocks->status }} </td> -->
                            
                            <!-- <td> 
                                <a href="/inventory/stocks/{{$stocks->id}}" class="btn btn-warning rounded">
                                    <i class="fa-regular fa-pen-to-square text-light"></i>
                                </a>
                                <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/inventory/stocks/remove/{{$stocks->id}}" title="Remove Data"
                                class="btn btn-danger rounded">
                                    <i class="fas fa-trash text-light"></i>
                                </a>
                                <a href="#" class="btn btn-danger rounded">Delete</a>
                            </td> -->
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
        $('#stocksTable').DataTable();
    } );
</script>
@endsection