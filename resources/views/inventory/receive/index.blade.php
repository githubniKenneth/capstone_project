@extends('partials.header')
@section('content')

<div class="table-listing-color m-3 p-3">

            <h2>Manage Receives</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Inventory</li>
                    <li class="breadcrumb-item ">Receives</li>
                </ol>
            </nav>
            
        <div class="d-flex flex-row-reverse pb-3">
            <a href="{{ route('inventory-receive.create') }}"class="btn btn-success">+</a>
        </div>
            
            <div class="table-responsive">
                <table class="table table-striped" id="receivesTable">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Control Number</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Date</th>
                            <th scope="col">Created By:</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $InvReceiving)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{ $InvReceiving->rec_code }} </td>
                                <td> {{ $InvReceiving->rec_supplier }} </td>
                                <td> {{ $InvReceiving->rec_date }} </td>
                                <td> {{ $InvReceiving->created_by }} </td>
                                <td> {{ $InvReceiving->rec_remarks }} </td>
                                <td> {{ ($InvReceiving->status == 1) ? "Active":"Inactive" }}</td>

                                <td> 
                                        <a href="/inventory/receive/{{$InvReceiving->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/inventory/receive/remove/{{$InvReceiving->id}}" title="Remove Data" 
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
        $('#receivesTable').DataTable();
    } );
</script>
@endsection