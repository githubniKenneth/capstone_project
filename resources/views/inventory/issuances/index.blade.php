@extends('partials.header')
@section('content')
<div class="table-listing-color m-3 p-3">

<h2>Manage Issuances</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
        <li class="breadcrumb-item ">Inventory</li>
        <li class="breadcrumb-item ">Issuances</li>
    </ol>
</nav>
    <div class="d-flex flex-row-reverse pb-3">
        <a href="{{ route('issuances.create') }}"class="btn btn-success">+</a>
    </div>
<div class="table-responsive">
    <table class="table table-striped" id="issuancesTable">
        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">Issuance Number</th>
                <th scope="col">Issued By</th>
                <th scope="col">Received By</th>
                <th scope="col">Branch</th>
                <th scope="col">Remarks</th>
                <th scope="col">Date</th>
                <th scope="col">Posting Status</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $issuances)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$issuances->issuance_control_no}} </td>
                <td> {{ $issuances->issuer->emp_full_name }} </td>
                <td> {{ $issuances->receiver->emp_full_name }} </td>
                <td>  Branch  </td>
                <td> {{ $issuances->remarks }} </td>
                <td> {{ ($issuances->cds->toFormattedDateString()) }}</td>
                <td>{{ ($issuances->is_posted == 1) ? "Posted":"Drafted" }}</td>
                <td>{{ ($issuances->status == 1) ? "Active":"Inactive" }}</td>
                
                
                <td> 
                    <a href="/inventory/issuances/{{$issuances->id}}" class="btn btn-warning rounded">
                        <i class="fa-regular fa-pen-to-square text-light"></i>
                    </a>
                    <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/inventory/issuances/remove/{{$issuances->id}}" title="Remove Data"
                    class="btn btn-danger rounded">
                        <i class="fas fa-trash text-light"></i>
                    </a>
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
    $('#issuancesTable').DataTable();
    } );
</script>
@endsection