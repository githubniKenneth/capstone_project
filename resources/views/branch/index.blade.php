@extends('partials.header')
    @section('content')

      <div class="table-listing-color m-3 p-3">

                    <h2>Manage Branches</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Personnel</li>
                            <li class="breadcrumb-item ">Branch</li>
                        </ol>
                    </nav>
                    
                <div class="d-flex flex-row-reverse pb-3">
                    <a href="{{ route('add-branch.create') }}"class="btn btn-success">+</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped" id="branch_table">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Branch Name</th>
                                <th scope="col">Full Address</th>
                                <th scope="col">Telephone No.</th>
                                <th scope="col">Phone No.</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $branch)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $branch->branch_name }} </td>
                                    <td> {{ textShortener($branch->full_address, $branch->id, 'full_address', 25) }} </td>
                                    <td> {{ $branch->branch_tele_no }} </td>
                                    <td> {{ $branch->branch_phone_no }} </td>
                                    <td> {{ $branch->branch_email }} </td>
                                    <td> {{ ($branch->cds->toFormattedDateString()) }}</td>
                                    <td> {{ ($branch->branch_status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="/personnel/branch/{{$branch->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/personnel/branch/remove/{{$branch->id}}" title="Remove Data" 
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
        $('#branch_table').DataTable();
    } );
</script>
@endsection