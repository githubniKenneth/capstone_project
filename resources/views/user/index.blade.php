@extends('partials.header')
    @section('content')
    <div class="table-listing-color m-3 p-3">
        <h2>Manage User</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">User Account</li>
                    <li class="breadcrumb-item ">User</li>
                </ol>
            </nav>
            
        <div class="d-flex flex-row-reverse pb-3"> 
            <button class="btn btn-success" onclick="window.location.href='{{ route('user.create') }}'" {{$buttons['Create']}}>+</button>
        </div>
                
        <div class="table-responsive">
            <table class="table table-striped" id="user_table">
                <thead >
                    <tr>
                    <th scope="col">No.</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)

                        @php
                            $full_name = ($user->emp_id == 0) ? 'Guest' : $user->employee->emp_full_name;
                        @endphp

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{ $full_name }}</td>
                            <td> {{ $user->email}}</td>
                            <td> {{ ($user->cds->toFormattedDateString()) }}</td>
                            <td> {{ $user->creator->emp_full_name }} </td>
                            <td> 
                                <button class="btn {{$user->status_color}}">
                                {{ ($user->status == 1) ? "Active":"Inactive" }}
                                </button>
                            </td>
                            <td> 
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                    data-id="{{ $user->id }}"
                                    data-status="{{ $user->status }}"
                                    data-url="{{ route('user.delete', $user->id) }}" {{$buttons['Remove']}}>
                                    <i class="fas fa-trash text-light fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
<script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#user_table').DataTable();
        } );
    </script>
@endsection