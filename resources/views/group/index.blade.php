@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
            
                <h2>Manage Groups</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Components</li>
                        <li class="breadcrumb-item ">Group</li>
                    </ol>
                </nav>

            <div class="d-flex flex-row-reverse pb-3">
                <a href="{{ route('group.create') }}"class="btn btn-success">+</a>
            </div>
            
                <div class="table-responsive">
                    <table class="table" id="group_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Group</th>
                                <th scope="col">Code</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $group)
                                <tr>
                                    
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $group->group_name }} </td>
                                    <td> {{ $group->group_code }} </td>
                                    <td> {{ $group->group_icon }} </td>
                                    <td> {{ textShortener($group->group_description, $group->id, 'group_description', 25) }} </td>
                                    <td> {{ ($group->cds->toFormattedDateString()) }}</td>
                                    <td> 
                                        <button class="btn {{$group->status_color}}">
                                        {{ ($group->status == 1) ? "Active":"Inactive" }}
                                        </button>
                                    </td>
                                    <td> 
                                        <a href="{{ route('group.edit', $group->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                        <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                            data-id="{{ $group->id }}"
                                            data-status="{{ $group->status }}"
                                            data-url="{{ route('group.delete', $group->id) }}">
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
        
    @endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#group_table').DataTable();
        } );
    </script>
@endsection