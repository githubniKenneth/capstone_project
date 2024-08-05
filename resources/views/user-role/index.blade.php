@extends('partials.header')
    @section('content')
    <div class="w-100 p-3">
        <!-- <div class="d-flex justify-content-between"> -->
            <div class="div">
                <h2>Manage User Role</h2>
            </div>
                
            <div class="d-flex justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">User Account</li>
                        <li class="breadcrumb-item ">User Role</li>
                    </ol>
                </nav>
                
            </div>
            <div class="d-flex flex-row-reverse pb-3"> 
                <button class="btn btn-success" onclick="window.location.href='{{ route('user-role.create') }}'" {{$buttons['Create']}}>+</button> 
            </div>
                
                <div class="table-responsive">
                    <table class="table table-striped" id="role_table">
                        <thead >
                            <tr>
                                <th class="col-2">#</th>
                                <th class="col-5">Role</th>
                                <th class="col-3">Status</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $role)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $role->user_role }} </td>
                                    <td> 
                                        <button class="btn {{$role->status_color}}">
                                        {{ ($role->status == 1) ? "Active":"Inactive" }}
                                        </button>
                                    </td>
                                    <td> 
                                        <a href="{{ route('user-role.edit', $role->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                            data-id="{{ $role->id }}"
                                            data-status="{{ $role->status }}"
                                            data-url="{{ route('user-role.delete', $role->id) }}" {{$buttons['Remove']}}>
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
    <script>
        $(document).ready( function () {
            $('#role_table').DataTable();
        } );
    </script>
    
<script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
@endsection