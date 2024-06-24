@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3"> 
            
                <h2>Manage Clients</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Client</li>
                    </ol>
                </nav>

                <div class="d-flex flex-row-reverse pb-3">
                    <a href="{{ 'client/add' }}"class="btn btn-success">Add</a>
                </div>

            <!-- </div> -->
                <div class="table-responsive">
                    <table class="table table-striped" id="client_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Business</th>
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
                            @foreach ($data as $client)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $client->client_full_name }} </td>
                                    <td> {{ $client->client_business_name }} </td>
                                    <td> {{ textShortener($client->client_full_address, $client->id,'client_full_address', 25) }} </td>
                                    <td> {{ $client->client_tele_no }} </td>
                                    <td> {{ $client->client_mobile_no }} </td>
                                    <td> {{ $client->client_email }} </td>
                                    <td> {{ ($client->cds->toFormattedDateString()) }}</td>
                                    <td> {{ ($client->status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="/client/{{$client->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/client/remove/{{$client->id}}" title="Remove Data" 
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
        </div>
    @endsection
        

@section('script')
<script>
    $(document).ready( function () {
        $('#client_table').DataTable();
    } );
</script>
@endsection