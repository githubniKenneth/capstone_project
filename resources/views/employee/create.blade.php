@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Add New Employee</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page">Personnel</li>
                    <li class="breadcrumb-item "><a href="{{ route('employee.index') }}" class="text-decoration-none">Employee</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Employee</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/personnel/employee/add" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-personal">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-personal" aria-expanded="true" aria-controls="flush-personal">
                                    Personal Information
                                </button>
                            </h2>
                            <div id="flush-personal" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-personal">
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="emp_first_name" value="{{ old('emp_first_name') }}">
                                            @error('emp_first_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Middle Name</label>
                                            <input class="form-control" type="text" name="emp_middle_name" value="{{ old('emp_middle_name') }}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="emp_last_name" value="{{ old('emp_last_name') }}">
                                            @error('emp_last_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Suffix</label>
                                            <input class="form-control" type="text" name="emp_suffix" value="{{ old('emp_suffix') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Name <span class="text-danger">*</span></label>
                                            <select name="branch_id" id="" class="form-select">
                                                <option value="">Select Role</option>
                                                @foreach ($branches as $branch)
                                                    <option value="{{$branch->id}}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{$branch->branch_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('branch_id')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Role <span class="text-danger">*</span></label>
                                            <select name="empr_id" id="" class="form-select">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}" {{ old('empr_id') == $role->id ? 'selected' : '' }}>{{$role->empr_role}}</option>
                                                @endforeach
                                            </select>
                                            @error('empr_id')
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
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-address">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-address" aria-expanded="true" aria-controls="flush-address">
                                    Address Information
                                </button>
                            </h2>
                            <div id="flush-address" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-address">
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Lot No.</label>
                                            <input class="form-control" type="text" name="emp_lot_no" value="{{ old('emp_lot_no') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Street <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="emp_street" value="{{ old('emp_street') }}">
                                            @error('emp_street')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Barangay <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="emp_brgy" value="{{ old('emp_brgy') }}">
                                            @error('emp_brgy')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">City <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="emp_city" value="{{ old('emp_city') }}">
                                            @error('emp_city')
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
                    <div class="accordion accordion-flush" id="accordion-flush-contact">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-contact" aria-expanded="true" aria-controls="flush-contact">
                                    Contact Information
                                </button>
                            </h2>
                            <div id="flush-contact" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-contact">
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Telephone No.</label>
                                            <input class="form-control" type="text" name="emp_tele_no" value="{{ old('emp_tele_no') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Phone No. <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="emp_phone_no" value="{{ old('emp_phone_no') }}">
                                            @error('emp_phone_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="emp_email" value="{{ old('emp_email') }}">
                                            @error('emp_email')
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
                
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <!-- hidden -->
                            <input type="hidden" value=1 name="status">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by">
                        </div>
                        <div>
                            <a href="{{ route('employee.index') }}" class="btn btn-secondary rounded">Cancel</a>
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
                window.location.href = "{{ route('employee.index') }}";
            })
        </script>
        @endif
    @endsection