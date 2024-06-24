@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Add New Module</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Components</li>
                        <li class="breadcrumb-item "><a href="{{ route('group.index') }}" class="text-decoration-none">User</a></li>
                        <li class="breadcrumb-item" aria-current="page">Add User</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="{{ route('module.store') }}" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-address">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-address" aria-expanded="true" aria-controls="flush-address">
                                    
                                </button>
                            </h2>
                            <div id="flush-address" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-address">
                                <div class="row d-flex p-3">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Module</label>
                                            <input class="form-control" type="text" name="module_name">
                                            @error('module_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Group</label>
                                            <select name="group_id" id="" class="form-select">
                                                <option value="">Select Group</option>
                                                <!-- <option value="">$data-></option> -->
                                                @foreach ($groups as $group)
                                                    <option value="{{$group->id}}">{{$group->group_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('group_id')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Code</label>
                                            <input class="form-control" type="text" name="module_code">
                                            @error('module_code')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Description</label>
                                            <input class="form-control" type="text" name="module_description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <!-- hidden -->
                            <!-- <input type="hidden" value=1 name="branch_status">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by"> -->
                        </div>
                        <div>
                            <a href="{{ route('module.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit">Save Changes</button>
                        </div>
                        
                    </div>
                </form>
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
            }).then(function() {
                window.location.href = "{{ route('module.index') }}";
            })
        </script>
        @endif
    
    @endsection