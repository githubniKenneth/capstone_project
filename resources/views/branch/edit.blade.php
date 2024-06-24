@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Edit {{$branch->branch_name}}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Personnel</li>
                        <li class="breadcrumb-item "><a href="{{ route('branch.index') }}" class="text-decoration-none">Branch</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit Branch</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/personnel/branch/{{ $branch->id }}" method="POST" class="d-flex flex-column w-100">
                @method('PUT')    
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
                                            <label for="" class="form-label">Branch</label>
                                            <input class="form-control" type="text" name="branch_name" value="{{ $branch->branch_name }}">
                                            @error('branch_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Lot No</label>
                                            <input class="form-control" type="text" name="branch_lot_no" value="{{ $branch->branch_lot_no }}">
                                            @error('branch_lot_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Street</label>
                                            <input class="form-control" type="text" name="branch_street" value="{{ $branch->branch_street }}">
                                            @error('branch_street')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Brgy</label>
                                            <input class="form-control" type="text" name="branch_brgy" value="{{ $branch->branch_brgy }}">
                                            @error('branch_brgy')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch City</label>
                                            <input class="form-control" type="text" name="branch_city" value="{{ $branch->branch_city }}">
                                            @error('branch_city')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Full address</label>
                                            <input class="form-control" type="text" name="full_address" value="{{ $branch->full_address }}">
                                            @error('full_address')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Telephone Number</label>
                                            <input class="form-control" type="text" name="branch_tele_no" value="{{ $branch->branch_tele_no }}">
                                            @error('branch_tele_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Phone Number</label>
                                            <input class="form-control" type="text" name="branch_phone_no" value="{{ $branch->branch_phone_no }}">
                                            @error('branch_phone_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Branch Email</label>
                                            <input class="form-control" type="text" name="branch_email" value="{{ $branch->branch_email }}">
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
                            <!-- <input type="hidden" value=1 name="branch_status">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by"> -->
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