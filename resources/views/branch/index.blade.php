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
                    <button class="btn btn-success" onclick="window.location.href='{{ route('add-branch.create') }}'" {{$buttons['Create']}}>+</button>
                    <!-- <a href="{{ route('add-branch.create') }}"class="btn btn-success">+</a> -->
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
                                    <td>
                                        <button class="btn {{$branch->status_color}}">
                                        {{ ($branch->branch_status == 1) ? "Active":"Inactive" }}
                                        </button>
                                    </td>
                                    <td> 
                                        <a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                            data-id="{{ $branch->id }}"
                                            data-status="{{ $branch->branch_status }}"
                                            data-url="{{ route('branch.delete', $branch->id) }}" {{$buttons['Remove']}}>
                                            <i class="fas fa-trash text-light fa-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    @endsection

@section('script')
<script>
    $(document).ready( function () {
        $('#branch_table').DataTable();
    } );
</script>


<script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
@endsection