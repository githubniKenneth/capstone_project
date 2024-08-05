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
            <button class="btn btn-success" onclick="window.location.href='{{ route('inventory-receive.create') }}'" {{$buttons['Create']}}>+</button>
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
                            <th scope="col">Posting Status</th>
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
                                <td> {{ ($InvReceiving->cds->toFormattedDateString()) }} </td>
                                <td> {{ $InvReceiving->user->employee->emp_full_name }} </td>
                                <td> {{ $InvReceiving->rec_remarks }} </td>
                                <td> 
                                    <button class="btn {{$InvReceiving->posting_status}}">
                                    {{ ($InvReceiving->is_posted == 1) ? "Posted":"Drafted" }}
                                    </button>
                                </td>
                                <td> 
                                    <button class="btn {{$InvReceiving->status_color}}">
                                    {{ ($InvReceiving->status == 1) ? "Active":"Inactive" }}
                                    </button>
                                </td>

                                <td> 
                                    <a href="{{ route('inventory-receive.edit', $InvReceiving->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                    <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                        data-id="{{ $InvReceiving->id }}"
                                        data-status="{{ $InvReceiving->status }}"
                                        data-url="{{ route('inventory-receive.delete', $InvReceiving->id) }}" {{ ($InvReceiving->is_posted == 1) ? "disabled":"" }} {{$buttons['Remove']}}>
                                        <i class="fas fa-trash text-light fa-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>                        
                </table>
            </div>
        </div>
        <script src="{{asset('js/remove-modal/open-modal.js')}}"></script>

@endsection

@section('script')
<script>
    $(document).ready( function () {
        $('#receivesTable').DataTable();
    } );
</script>
@endsection