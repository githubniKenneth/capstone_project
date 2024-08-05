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
                    <button class="btn btn-success" onclick="window.location.href='{{ route('ocular.create') }}'" {{$buttons['Create']}}>+</button>
                </div>

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
                                            @php $ocular_status = 'Pending'; 
                                                 $status_color = 'status-pending';
                                            @endphp
                                            @break
                                        @case(1)
                                            @php $ocular_status = 'On Going'; 
                                                 $status_color = 'status-ongoing';
                                            @endphp
                                            @break
                                        @case(2)
                                            @php $ocular_status = 'Done'; 
                                                 $status_color = 'status-done';
                                            @endphp
                                            @break
                                        @case(3)
                                            @php $ocular_status = 'Cancelled'; 
                                                 $status_color = 'status-cancelled';
                                                @endphp
                                            @break
                                    @endswitch
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $ocular->ocular_date }}</td>
                                    <td> {{ $ocular->client->client_full_name }}</td>
                                    <td> {{ $ocular->client->client_full_address }}</td>
                                    <td> 
                                        <button class="btn {{$status_color}}">
                                            {{ $ocular_status }}
                                        </button>
                                    </td>
                                    <td> {{ ($ocular->cds->toFormattedDateString()) }}</td>
                                    <td> 
                                        <button class="btn {{$ocular->status_color}}">
                                            {{ ($ocular->status == 1) ? "Active":"Inactive" }}
                                        </button>
                                    </td>
                                    <td> 
                                        <a href="{{ route('ocular.edit', $ocular->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <button class="btn btn-success rounded" onclick="window.location.href='{{ route('ocular.email', $ocular->id) }}'" title="Send Email"><i class="fa-regular fa-envelope text-light"></i></button>
                                        <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                            data-id="{{ $ocular->id }}"
                                            data-status="{{ $ocular->status }}"
                                            data-url="{{ route('ocular.delete', $ocular->id) }}" {{$buttons['Remove']}}>
                                            <i class="fas fa-trash text-light fa-lg"></i>
                                        </button>
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
            $('#a').DataTable();
        } );
    </script>
@endsection