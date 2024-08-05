@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Add New Branch</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Personnel</li>
                    <li class="breadcrumb-item "><a href="{{ route('branch.index') }}" class="text-decoration-none">Branch</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add branch</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/personnel/branch/add" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-address">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-address" aria-expanded="true" aria-controls="flush-address">
                                    Address Information
                                </button>
                            </h2>
                            <div id="flush-address" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-address">
                                <div class="row d-flex p-3">
                                    <div class="col-md-4">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Name <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="branch_name" value={{old('branch_name')}}>
                                            @error('branch_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Lot No.</label>
                                            <input class="form-control" type="text" name="branch_lot_no" value={{old('branch_lot_no')}}>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Street <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="branch_street" value={{old('branch_street')}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex p-3">
                                    <div class="col-md-4">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Barangay <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="branch_brgy" value={{old('branch_brgy')}}>
                                            @error('branch_brgy')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">City <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="branch_city" value={{old('branch_city')}}>
                                            @error('branch_city')
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Telephone No.</label>
                                            <input class="form-control" type="text" name="branch_tele_no" value={{old('branch_tele_no')}}>
                                            @error('branch_tele_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Phone No. <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="branch_phone_no" value={{old('branch_phone_no')}}>
                                            @error('branch_phone_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Email <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="branch_email" value={{old('branch_email')}}>
                                            @error('branch_email')
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
                            <input type="hidden" value=1 name="branch_status">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by">
                        </div>
                        <div>
                        <a href="{{ route('branch.index') }}" class="btn btn-secondary rounded">Cancel</a>
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
                window.location.href = "{{ route('branch.index') }}";
            })
        </script>
    @endif



    @endsection