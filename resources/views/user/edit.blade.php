@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Edit User</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">User Account</li>
                    <li class="breadcrumb-item "><a href="{{ route('user.index') }}" class="text-decoration-none">User</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit User</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="{{route('user.update', $data->id)}}" method="POST" class="d-flex flex-column w-100">
                    @method('PUT')
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
                                            <label for="" class="form-label">Username</label>
                                            <input class="form-control" type="text" name="username" value="{{ $data->username }}">
                                            @error('username')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Employee</label>
                                            <select name="emp_id" id="" class="form-select">
                                                <option value="">Select Employee</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}" {{($data->emp_id == $employee->id) ? "selected" :"" }}>{{$employee->emp_full_name}}</option>
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
                                            <label for="" class="form-label">Password</label>
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
                                            <label for="" class="form-label">Email</label>
                                            <input class="form-control" type="email" name="email" value="{{ $data->email }}">
                                            @error('email')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Confirm Password</label>
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
                    <div class="accordion accordion-flush" id="accordion-flush-access-control">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-heading">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-access-control" aria-expanded="true" aria-controls="flush-access-control">
                                    User Access Control
                                </button>
                            </h2>
                            <div id="flush-access-control" class="accordion-collapse collapse show m-2" aria-labelledby="flush-access-control" data-bs-parent="#accordion-flush-access-control">
                                <div class="row">
                                {{-- Group Query --}}
                                <?php $group_counter = 0?>
                                    @foreach ($groups as $group)
                                        <div class="col-md-6 mb-2">
                                            <div class="accordion-item border">
                                                <h2 class="accordion-header" id="flush-heading">
                                                    <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#acc-body-{{$group->id}}" aria-expanded="false" aria-controls="acc-body">
                                                        <div class="col-sm-4">
                                                            <?php
                                                                // Check if the group is selected
                                                                $isGroupChecked = $userAccessGroups->where('group_id', $group->id)->isNotEmpty();
                                                            ?>
                                                            <input class="form-check-input group" id="parent_group_{{$group->id}}" type="checkbox" name="group_id[{{$group_counter}}]" value="{{$group->id}}" {{ $isGroupChecked ? 'checked' : '' }}>
                                                            <label class="form-check-label">{{$group->group_name}}</label>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <?php $group_counter++?>
                                                {{-- Permission Query --}}
                                                    <?php $group_permission_counter = 0?>
                                                    <div class="accordion-body">
                                                        <div id="acc-body-{{$group->id}}" class="accordion-collapse collapse row mb-2" aria-labelledby="acc-body" data-bs-parent="#acc-body-{{$group->id}}">
                                                            @foreach ($permissions as $permission)
                                                            <?php
                                                                $isPermissionChecked = $userAccessGroups->where('group_id', $group->id)->contains(function ($value) use ($permission) {
                                                                    return in_array($permission->name, explode(',', $value->permissions));
                                                                });
                                                            ?>

                                                                <div class="col-sm-4">
                                                                    <input class="form-check-input group_id_{{$group->id}} group_permission_{{$group->id}}" type="checkbox" name="group_permission[{{ $group->id }}][{{ $group_permission_counter }}]" value="{{$permission->name}}" {{ $isPermissionChecked ? 'checked' : '' }}>
                                                                    <label class="form-check-label">{{$permission->name}}</label>
                                                                </div>
                                                            <?php $group_permission_counter++?>
                                                            @endforeach
                                                        </div>
                                                        {{-- Module Query --}}
                                                        <?php $module_counter = 0?>
                                                        <div id="acc-body-{{$group->id}}" class="accordion-collapse collapse row" aria-labelledby="acc-body" data-bs-parent="#acc-body-{{$group->id}}">
                                                            @foreach ($modules as $module)
                                                                @if ($module->group_id == $group->id)
                                                                    <div class="col-sm-4">
                                                                        <?php
                                                                            // Check if the module is selected
                                                                            $isModuleChecked = $userAccessModules->where('module_id', $module->id)->isNotEmpty();
                                                                        ?>
                                                                        <input class="form-check-input module group_id_{{$group->id}}" id="parent_module_{{$module->id}}" type="checkbox" name="module_id[{{$module_counter}}]" value="{{$module->id}}" {{ $isModuleChecked ? 'checked' : '' }}>
                                                                        <label class="form-check-label"><b>{{$module->module_name}}</b></label>
                                                                    </div>
                                                                    {{-- Permission Query --}}
                                                                    <?php $module_permission_counter = 0?>
                                                                    <div id="acc-body-{{$group->id}}" class="accordion-collapse collapse row mb-2" aria-labelledby="acc-body" data-bs-parent="#acc-body-{{$group->id}}">
                                                                        @foreach ($permissions as $permission)
                                                                            <?php
                                                                                // Check if the permission is selected for this module
                                                                                $isModulePermissionChecked = $userAccessModules->where('module_id', $module->id)->contains(function ($value) use ($permission) {
                                                                                    return in_array($permission->name, explode(',', $value->permissions));
                                                                                });
                                                                            ?>

                                                                            <div class="col-sm-4">
                                                                                <input class="form-check-input group_id_{{$group->id}} module_id_{{$module->id}}" type="checkbox" name="module_permission[{{ $module->id }}][{{$module_permission_counter}}]" value="{{$permission->name}}" {{ $isModulePermissionChecked ? 'checked' : '' }}>
                                                                                <label class="form-check-label">{{$permission->name}}</label>
                                                                            </div>
                                                                        <?php $module_permission_counter++?>
                                                                        @endforeach
                                                                    </div>  
                                                                @endif
                                                                <?php $module_counter++?>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit">Save Changes</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
        @endsection
        

        @section('script')
    
            <script src="{{asset('js/user-access/permissions.js')}}"></script>
        @endsection