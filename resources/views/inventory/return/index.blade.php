@extends('partials.header')
@section('content')
<div class="table-listing-color m-3 p-3">

<h2>Manage Returns</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
        <li class="breadcrumb-item ">Inventory</li>
        <li class="breadcrumb-item ">Returns</li>
    </ol>
</nav>
    <div class="d-flex flex-row-reverse pb-3">
        <button class="btn btn-success" onclick="window.location.href='{{ route('return.create') }}'" {{$buttons['Create']}}>+</button>
    </div>
<div class="table-responsive">
    <table class="table table-striped" id="returnTable">
        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">Return Number</th>
                <th scope="col">Returned By</th>
                <th scope="col">Received By</th>
                <th scope="col">Branch</th>
                <th scope="col">Remarks</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $return)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$return->return_control_no}} </td>
                <td> {{ $return->returner->emp_full_name }} </td>
                <td> {{ $return->receiver->emp_full_name }} </td>
                <td>  {{ $return->branch->branch_name }}  </td>
                <td> {{ $return->remarks }} </td>
                <td> {{ ($return->cds->toFormattedDateString()) }}</td>
                <td>
                    <button class="btn {{$return->status_color}}">
                    {{ $return->status }}
                    </button>
                </td>
                
                
                <td> 
                    <a href="{{ route('return.edit', $return->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                    <!-- <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                        data-id="{{ $return->id }}"
                        data-status="{{ $return->status }}"
                        data-url="{{ route('return.delete', $return->id) }}" {{$buttons['Remove']}}>
                        <i class="fas fa-trash text-light fa-lg"></i>
                    </button> -->
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

    @if (Session::has('message'))
        <script>
            swal({
                title: "Success!",
                text: "{{ Session::get('message') }}",
                icon: 'success',
                timer: 2000,
                buttons: false
            })
        </script>
    @endif 
@endsection

@section('script')
<script>
    $(document).ready( function () {
    $('#returnTable').DataTable();
    } );
</script>
@endsection