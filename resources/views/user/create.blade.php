@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Add New User</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">User Account</li>
                    <li class="breadcrumb-item "><a href="{{ route('user.index') }}" class="text-decoration-none">User</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add User</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="{{route('user.store')}}" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-address">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-address" aria-expanded="true" aria-controls="flush-address">
                                    User Information
                                </button>
                            </h2>
                            <div id="flush-address" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-address">
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Employee <span class="text-danger">*</span></label>
                                            <select name="emp_id" class="form-select">
                                                <option value="">Select Employee</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}">{{$employee->emp_full_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('emp_id')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">User Role <span class="text-danger">*</span></label>
                                            <select name="user_role" class="form-select">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $user_role)
                                                    <option value="{{$user_role->id}}">{{$user_role->user_role}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_role')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Data Filter <span class="text-danger">*</span></label>
                                            <select name="data_access" class="form-select">
                                                <option value="">Select Accessible Data</option>
                                                @foreach ($data_access as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @error('data_access')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email">
                                            @error('email')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Password <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password">
                                            @error('password')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password_confirmation">
                                            @error('password_confirmation')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- <div class="accordion accordion-flush" id="accordion-flush-access-control">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-heading">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-access-control" aria-expanded="true" aria-controls="flush-access-control">
                                    User Access Control
                                </button>
                            </h2>
                            <div id="flush-access-control" class="accordion-collapse collapse show" aria-labelledby="flush-access-control" data-bs-parent="#accordion-flush-access-control">
                                <div class="row">
                                {{-- Group Query --}}
                                    @foreach ($groups as $group)
                                        <div class="col-md-6">
                                            <div class="accordion-item border">
                                                <h2 class="accordion-header" id="flush-heading">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc-body-{{$group->id}}" aria-expanded="true" aria-controls="acc-body">
                                                        <div class="col-sm-4">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">{{$group->group_name}}</label>
                                                        </div>
                                                    </button>
                                                </h2>
                                                {{-- Permission Query --}}
                                                    <div class="accordion-body">
                                                        <div id="acc-body-{{$group->id}}" class="accordion-collapse collapse show row mb-2" aria-labelledby="acc-body" data-bs-parent="#acc-body-{{$group->id}}">
                                                            @foreach ($permissions as $permission)
                                                                <div class="col-sm-4">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">{{$permission->name}}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        {{-- Module Query --}}
                                                        <div id="acc-body-{{$group->id}}" class="accordion-collapse collapse show row" aria-labelledby="acc-body" data-bs-parent="#acc-body-{{$group->id}}">
                                                            @foreach ($modules as $module)
                                                                @if ($module->group_id == $group->id)
                                                                    <div class="col-sm-4">
                                                                        <input class="form-check-input" type="checkbox">
                                                                        <label class="form-check-label">{{$module->module_name}}</label>
                                                                    </div>
                                                                    {{-- Permission Query --}}
                                                                    <div id="acc-body-{{$group->id}}" class="accordion-collapse collapse show row mb-2" aria-labelledby="acc-body" data-bs-parent="#acc-body-{{$group->id}}">
                                                                        @foreach ($permissions as $permission)
                                                                            <div class="col-sm-4">
                                                                                <input class="form-check-input" type="checkbox">
                                                                                <label class="form-check-label">{{$permission->name}}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>  
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <!-- hidden -->
                            <!-- <input type="hidden" value=1 name="branch_status">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by"> -->
                        </div>
                        <div>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit">Save Changes</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
        @endsection