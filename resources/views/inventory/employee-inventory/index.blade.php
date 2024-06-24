@extends('partials.header')
@section('content')

<div class="table-listing-color m-3 p-3">

            <h2>Manage Employee Inventory</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Inventory</li>
                    <li class="breadcrumb-item ">Employee Inventory</li>
                </ol>
            </nav>
            
            <div class="table-responsive">
                <table class="table table-striped" id="employeeInventoryTable">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Issued Qty</th>
                            <th scope="col">Return Qty</th>
                            <th scope="col">Balance Qty</th>
                            <!-- <th scope="col">Status</th> -->
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emp_inv as $data)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{$data->employee->emp_full_name}} </td>
                            <td> {{$data->item->product_name}} </td>
                            <td> {{$data->issued_qty}} </td>
                            <td> {{ ($data->returned_qty == null ) ? 0 : $data->returned_qty }} </td>
                            <td> {{$data->balance_qty}} </td>
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
        $('#employeeInventoryTable').DataTable();
    } );
</script>
@endsection