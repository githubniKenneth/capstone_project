@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
            <h2>Edit Item</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item "><a href="{{ route('product-item.index') }}" class="text-decoration-none">Item</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit Item</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/product/item/{{ $item->id }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column w-100">
                @method('PUT')    
                @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-address">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-address" aria-expanded="true" aria-controls="flush-address">
                                    Item Information
                                </button>
                            </h2>
                            <div id="flush-address" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-address">
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Item Name</label>
                                            <input class="form-control" type="text" name="product_name" value="{{ $item->product_name }}">
                                            @error('product_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Item Type</label>
                                            <select name="item_types" id="" class="form-select">
                                                <option value="">Select Item Type</option>
                                                @foreach ($item_types as $key => $value) <!-- run mo-->
                                                    <option value="{{$key}}" {{($item->item_type == $key) ? "selected" :""}} > {{$value}} </option>
                                                @endforeach
                                            </select>
                                            @error('item_types')
                                                    <p class="text-danger">
                                                        {{$message}} 
                                                    </p>
                                                    <!--  -->
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Price</label>
                                            <input class="form-control" type="text" name="product_price" value="{{ $item->product_price }}">
                                            @error('product_price')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">UOM</label>
                                            <select name="uom_id" id="" class="form-select">
                                                <option value="">Select Unit</option>
                                                @foreach ($uom as $unit) <!--$uom sa controller, pinasa gamit compact which is data from unit table-->
                                                        <!-- <option value="{{$unit->id}}">{{$unit->uom_shortname}}</option> -->
                                                        <option value="{{$unit->id}}" {{($item->uom_id == $unit->id) ? "selected" :""}}>{{$unit->uom_shortname}}</option>
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
                                            <textarea class="form-control" name="product_desc" id="" cols="30" rows="2">{{ $item->product_desc }}</textarea>
                                            @error('product_desc')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Remarks</label>
                                            <textarea class="form-control" name="remarks" id="" cols="30" rows="2">{{ $item->remarks }}</textarea>
                                            @error('remarks')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex p-3">

                                    <div class="col-md-6">
                                            <input class="form-control-file" type="file" name="image" id="image" onchange="previewImage()" >
                                            <input type="hidden" name="current_image" value="{{ $item->file_path }}" >
                                            <img id="imagePreview" src="#" alt="Preview" style="max-width: 100px; display: none;">

                                        <div class="form-group d-flex flex-column">
                                            <div class="flex-column" style="margin-top:30px; margin-bottom:30px;">
                                            @if ($item->file_path)
                                                <img src="{{ asset('storage/uploads/itemImages/' . basename($item->file_path)) }}" 
                                                    lt="Product Image" style="max-width: 100px;">
                                            @else
                                                No Image
                                            @endif

                                            @error('image')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                            </div>
                                        </div>
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
                                            <label for="" class="form-label">Brand</label>
                                            <select name="brand_id" id="" class="form-select">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand) <!--$brands sa controller, pinasa gamit compact which is data from unit table-->
                                                        <!-- <option value="{{$brand->id}}">{{$unit->uom_shortname}}</option> -->
                                                        <option value="{{$brand->id}}" {{($item->brand_id == $brand->id) ? "selected" :""}}>{{$brand->brand_name}}</option>
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
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category) <!--$uom sa controller, pinasa gamit compact which is data from unit table-->
                                                        <!-- <option value="{{$unit->id}}">{{$unit->uom_shortname}}</option> -->
                                                        <option value="{{$category->id}}" {{($item->category_id == $category->id) ? "selected" :""}}>{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
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
                                            <label for="" class="form-label">Series</label>
                                            <select name="series_id" id="" class="form-select">
                                                <option value="">Select Series</option>
                                                @foreach ($series as $ser) <!--$uom sa controller, pinasa gamit compact which is data from unit table-->
                                                        <!-- <option value="{{$unit->id}}">{{$unit->uom_shortname}}</option> -->
                                                        <option value="{{$ser->id}}" {{($item->series_id == $ser->id) ? "selected" :""}}>{{$ser->series_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('series_id')
                                                    <p class="text-danger">
                                                        {{$message}}
                                                    </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Camera Resolution</label>
                                            <select name="resolution_desc" id="" class="form-select">
                                                <option value="">Select Camera Resolution</option>
                                                @foreach ($camera_resolutions as $resolution) <!--$uom sa controller, pinasa gamit compact which is data from unit table-->
                                                        <!-- <option value="{{$unit->id}}">{{$unit->uom_shortname}}</option> -->
                                                        <option value="{{$resolution->id}}" {{($item->resolution_id == $resolution->id) ? "selected" :""}}>{{$resolution->resolution_desc}}</option>
                                                @endforeach
                                            </select>
                                            @error('resolution_desc')
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
                            <a href="{{ route('product-item.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit">Save Changes</button>
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

    