@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Edit {{$uom->uom_name}}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item "><a href="{{ route('product-uom.index') }}" class="text-decoration-none">Unit of Measurement</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit Unit of Measurement</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/product/uom/{{ $uom->id }}" method="POST" class="d-flex flex-column w-100">
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
                                            <label for="" class="form-label">Unit of Measurement Name</label>
                                            <input class="form-control" type="text" name="uom_name" value="{{ $uom->uom_name }}">
                                            @error('uom_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Unit of Measurement Shortname</label>
                                            <input class="form-control" type="text" name="uom_shortname" value="{{ $uom->uom_shortname }}">
                                            @error('uom_shortname')
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
                            <a href="{{ route('product-uom.index') }}" class="btn btn-secondary rounded">Cancel</a>
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
                window.location.href = "{{ route('product-uom.index') }}";
            })
        </script>
        @endif
    @endsection