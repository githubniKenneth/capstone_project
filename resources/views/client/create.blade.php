@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Add New Client</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Client</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center" id="ano">
                <form action="/client/add" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-personal" >
                        <div class="accordion-item border">
                            <div class="accordion-header mb-2" id="accordion-item">
                                <button class="accordion-button collapsed p-0 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-personal" aria-expanded="true" aria-controls="flush-personal">
                                    Personal Information
                                </button>
                            </div>
                            <div id="flush-personal" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-personal">
                                <div class="row d-flex p-3">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column" >
                                            <label for="" class="form-label">Business Name</label>
                                            <input class="form-control" type="text" name="client_business_name" >
                                            @error('client_business_name')
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
                                            <label for="" class="form-label">First Name <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="client_first_name" value={{old('client_first_name')}}>
                                            @error('client_first_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Middle Name</label>
                                            <input class="form-control" type="text" name="client_middle_name">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Last Name <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="client_last_name" value={{old('client_last_name')}}>
                                            @error('client_last_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Suffix</label>
                                            <input class="form-control" type="text" name="client_suffix">
                                            @error('client_full_name')
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
                                            <input class="form-control" type="text" name="client_lot_no" value={{old('client_lot_no')}}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Street <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="client_street" value={{old('client_street')}}>
                                            @error('client_street')
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
                                            <label for="" class="form-label">Barangay <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="client_brgy" value={{old('client_brgy')}}>
                                            @error('client_brgy')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">City <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="client_city" value={{old('client_city')}}>
                                            @error('client_city')
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
                                            <input class="form-control" type="text" name="client_tele_no" value={{old('client_tele_no')}}>
                                            @error('client_tele_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Phone No. <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="client_mobile_no" value={{old('client_mobile_no')}}>
                                            @error('client_mobile_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Email <span class="required-field">*</span></label>
                                            <input class="form-control" type="text" name="client_email" value={{old('client_email')}}>
                                            @error('client_email')
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
                            <a href="{{ route('client.index') }}" class="btn btn-secondary rounded">Cancel</a>
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
                window.location.href = "{{ route('client.index') }}";
            })
        </script>
        @endif
    
    @endsection