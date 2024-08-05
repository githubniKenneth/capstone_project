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
                            <th scope="col">Received Qty</th>
                            <th scope="col">Sold Qty</th>
                            <th scope="col">Issued Qty</th>
                            <th scope="col">Returned Qty</th>
                            <th scope="col">Balance Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $stocks)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{ $stocks->item->product_name }} </td>
                            <td> {{ $stocks->received_qty }} </td>
                            <td> {{ $stocks->sold_qty }} </td>
                            <td> {{ $stocks->issued_qty }} </td>
                            <td> {{ $stocks->returned_qty }} </td>
                            <td> {{ $stocks->balance_qty }} </td>
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
        $('#stocksTable').DataTable();
    } );
</script>
@endsection