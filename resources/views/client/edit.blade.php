@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Edit Client Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">client</li>
                        <li class="breadcrumb-item" aria-current="page">Edit Client Details</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/client/{{ $client->id }}" method="POST" class="d-flex flex-column w-100">
                @method('PUT')    
                @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-address">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-address" aria-expanded="true" aria-controls="flush-address">
                                    Client Details
                                </button>
                            </h2>
                            <div id="flush-address" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-address">
                                <div class="row d-flex p-3">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Business Name</label>
                                            <input class="form-control" type="text" name="client_business_name" value="{{ $client->client_business_name }}">
                                            @error('client_business_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client First Name</label>
                                            <input class="form-control" type="text" name="client_first_name" value="{{ $client->client_first_name }}">
                                            @error('client_first_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Middle Name</label>
                                            <input class="form-control" type="text" name="client_middle_name" value="{{ $client->client_middle_name }}">
                                            @error('client_middle_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Last Name</label>
                                            <input class="form-control" type="text" name="client_last_name" value="{{ $client->client_last_name }}">
                                            @error('client_last_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Full Name</label>
                                            <input class="form-control" type="text" name="client_full_name" value="{{ $client->client_full_name }}">
                                            @error('client_full_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Suffix</label>
                                            <input class="form-control" type="text" name="client_suffix" value="{{ $client->client_suffix }}">
                                            @error('client_suffix')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Lot No</label>
                                            <input class="form-control" type="text" name="client_lot_no" value="{{ $client->client_lot_no }}">
                                            @error('client_lot_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Street</label>
                                            <input class="form-control" type="text" name="client_street" value="{{ $client->client_street }}">
                                            @error('client_street')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Barangay</label>
                                            <input class="form-control" type="text" name="client_brgy" value="{{ $client->client_brgy }}">
                                            @error('client_brgy')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client City</label>
                                            <input class="form-control" type="text" name="client_city" value="{{ $client->client_city }}">
                                            @error('client_city')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Mobile Number</label>
                                            <input class="form-control" type="text" name="client_mobile_no" value="{{ $client->client_mobile_no }}">
                                            @error('client_mobile_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Telephone Number</label>
                                            <input class="form-control" type="text" name="client_tele_no" value="{{ $client->client_tele_no }}">
                                            @error('client_tele_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Email</label>
                                            <input class="form-control" type="text" name="client_email" value="{{ $client->client_email }}">
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
                            <!-- <input type="hidden" value=1 name="branch_status">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by"> -->
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