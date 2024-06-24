@extends('partials.header')
    @section('content')
    <div class="table-listing-color m-3 p-3">
         
                 <h2>Manage Oculars</h2>
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Deployment</li>
                            <li class="breadcrumb-item ">Ocular</li>
                        </ol>
                    </nav>

                <div class="d-flex flex-row-reverse pb-3">
                    <a href="{{ route('ocular.create') }}"class="btn btn-success">Add</a>    
                </div>

            <!-- </div> -->
                <div class="table-responsive">
                    <table class="table" id="a">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Client</th>
                                <th scope="col">Full Address</th>
                                <th scope="col">Ocular Status</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $ocular)
                                    @switch($ocular->ocular_status)
                                        @case(0)
                                            @php $ocular_status = 'Pending'; @endphp
                                            @break
                                        @case(1)
                                            @php $ocular_status = 'On Going'; @endphp
                                            @break
                                        @case(2)
                                            @php $ocular_status = 'Done'; @endphp
                                            @break
                                        @case(3)
                                            @php $ocular_status = 'Cancelled'; @endphp
                                            @break
                                    @endswitch
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $ocular->ocular_date }}</td>
                                    <td> {{ $ocular->client->client_full_name }}</td>
                                    <td> {{ $ocular->client->client_full_address }}</td>
                                    <td> {{ $ocular_status }}</td>
                                    <td> {{ ($ocular->cds->toFormattedDateString()) }}</td>
                                    <td> {{ ($ocular->ocular_status == 1) ? "Active":"Inactive" }}</td>
                                    <td> 
                                        <a href="ocular/{{$ocular->id}}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <a data-toggle="modal" id="removeButton" data-target="#removeModal" data-attr="/ocular/remove/{{$ocular->id}}" title="Remove Data" 
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
            $('#a').DataTable();
        } );
    </script>
@endsection