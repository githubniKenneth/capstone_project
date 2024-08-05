@extends('partials.header')
@section('content')
    <div class="w-100 p-3">
        <h2>Add New Item</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Product</li>
                    <li class="breadcrumb-item "><a href="{{ route('product-item.index') }}" class="text-decoration-none">Items</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Item</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column w-100">
            @csrf
                <div class="accordion accordion-flush mb-2" id="accordion-flush-item">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item" aria-expanded="true" aria-controls="flush-item">
                                Item Information 
                            </button>
                        </h2>
                        <div id="flush-item" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item">                                    
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Item Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_name" value="{{ old('product_name') }}">
                                        @error('product_name')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Item Type <span class="text-danger">*</span></label>
                                        <select name="item_type" id="" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach ($item_types as $key => $value)
                                                <option value="{{$key}}" {{ old('item_type') == $key ? 'selected' : '' }}>{{$value}}</option>
                                            @endforeach
                                            <!-- <option value="">$data-></option> -->
                                            
                                        </select>
                                        @error('item_type')
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
                                        <label for="" class="form-label">Price <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_price" value="{{ old('product_price') }}">
                                        @error('product_price')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Unit of Measurement <span class="text-danger">*</span></label>
                                        <select name="uom_id" id="" class="form-select">
                                            <option value="">Select Unit</option>
                                            <!-- <option value="">$data-></option> -->
                                            @foreach ($uom as $unit)
                                                <option value="{{$unit->id}}" {{ old('uom_id') == $unit->id ? 'selected' : '' }}>{{$unit->uom_shortname}}</option>
                                            @endforeach
                                        </select>
                                        @error('uom_id')
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
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" name="product_desc" id="" cols="30" rows="2" >{{ old('product_desc') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="" cols="30" rows="2">{{ old('remarks') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column" style="margin-bottom:50px;">
                                        <label for="" class="form-label">Image</label>
                                        <input class="form-control-file" type="file" name="image" id="image" onchange="previewImage()" >
                                        <img id="imagePreview" src="#" alt="Preview" style="max-width: 100px; display: none;">                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush mb-2" id="accordion-flush-specification">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-specification" aria-expanded="true" aria-controls="flush-specification">
                                Item Specifications
                            </button>
                        </h2>
                        <div id="flush-specification" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-specification">
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Brand <span class="text-danger">*</span></label>
                                        <select name="brand_id" id="" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Category</label>
                                        <select name="category_id" id="" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Series</label>
                                        <select name="series_id" id="" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach ($series as $series_value)
                                                <option value="{{$series_value->id}}" {{ old('series_id') == $series_value->id ? 'selected' : '' }}>{{$series_value->series_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Resolution</label>
                                        <select name="resolution_id" id="" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach ($camera_resolutions as $resolution)
                                                <option value="{{$resolution->id}}"  {{ old('resolution_id') == $resolution->id ? 'selected' : '' }}>{{$resolution->resolution_desc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                
                            </div>


                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('product-item.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" href="{{ route('product-item.index') }}" type="submit">Save Changes</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <script>
        function previewImage() {
            var fileInput = document.getElementById('image');
            var imagePreview = document.getElementById('imagePreview');
            
            // Display ng preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                // Walang display if hindi naka pili
                imagePreview.style.display = 'none';
            }
        }
    </script>

        @if (Session::has('message'))
        <script>
            swal({
                title: "Success!",
                text: "{{ Session::get('message') }}",
                icon: 'success',
                timer: 2000,
                buttons: false
            }).then(function() {
                window.location.href = "{{ route('product-item.index') }}";
            })
        </script>
        @endif
@endsection