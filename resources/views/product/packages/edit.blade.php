@extends('partials.header')
    @section('content')
    @include('product.item.item-list-modal')
        <div class="w-100 p-3">
            <h2>Edit Package</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item "><a href="{{ route('product-category.index') }}" class="text-decoration-none">Category</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit Category</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/product/packages/{{ $packages->id }}" method="POST" class="d-flex flex-column w-100">
                @method('PUT')    
                @csrf
                    
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-item">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item" aria-expanded="true" aria-controls="flush-item">
                                Package Information 
                            </button>
                        </h2>
                        <div id="flush-item" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item">
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Package Name</label>
                                        <input class="form-control" type="text" name="pack_name" value="{{ $packages->pack_name }}">
                                        @error('pack_name')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Camera Number</label>
                                        <input class="form-control" type="text" name="camera_number" value="{{ $packages->camera_number }}">
                                        @error('camera_number')
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
                                        <label for="" class="form-label">Price</label>
                                        <input class="form-control" type="text" name="pack_price" value="{{ $packages->pack_price }}">
                                        @error('pack_price')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Brand</label>
                                        <select name="brand_id" id="" class="form-select">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand) <!--$brands sa controller, pinasa gamit compact which is data from unit table-->
                                                    <option value="{{$brand->id}}" {{($packages->brand_id == $brand->id) ? "selected" :""}}>{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
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
                                        <label for="" class="form-label">Resolution</label>
                                        <select name="resolution_id" id="" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach ($camera_resolutions as $resolution)
                                                <option value="{{$resolution->id}}"{{($packages->resolution_id == $resolution->id) ? "selected" :""}}>{{$resolution->resolution_desc}}</option>
                                            @endforeach
                                        </select>
                                        @error('resolution_id')
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
                                        <textarea class="form-control" name="pack_description" id="" cols="30" rows="2">{{ $packages->pack_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="pack_remarks" id="" cols="30" rows="2">{{ $packages->pack_remarks }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Technical Specifications</label>
                                        <textarea class="form-control" name="technical_specification" id="" cols="30" rows="2">{{ $packages->technical_specification }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush mb-2" id="accordion-flush-employee">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-employee" aria-expanded="true" aria-controls="flush-employee">
                                Item Details
                            </button>
                        </h2>
                        <div id="flush-employee" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-employee">
                            <div class="p-3">
                                <div class="d-flex justify-content-end pb-4" >
                                    <a href="{{ route('product-packages.item-list') }}" data-toggle="modal" id="itemList" data-target="#itemListModal" title="Remove Data"
                                        class="btn btn-success rounded">
                                            Show Item List
                                    </a>
                                </div>
                                @error('item')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td class="col-md-1">No</td>
                                            <td class="col-md-4">Item Name</td>
                                            <td class="col-md-2">Unit</td>
                                            <td class="col-md-2">Price</td>
                                            <td class="col-md-2">Qty</td>
                                            <td class="col-md-1">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="selectedDataList">
                                        @foreach ($package_details as $package_detail)
                                                
                                                <tr>
                                                    <td class="col-md-1"> {{$loop->iteration}} </td>
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][item_id]" value='{{$package_detail->item_id}}' class="col-md-5"></input>
                                                    <td class="col-md-5">{{ $package_detail->item->product_name }}</td>
                                                    <td class="col-md-2">{{ $package_detail->item->uom->uom_shortname}}</td>
                                                    <td class="col-md-2">{{ $package_detail->item->product_price}}</td>
                                                    <td class="col-md-2"><input class="form-control" type="text" name="item[{{$loop->iteration}}][item_qty]" value="{{ $package_detail->item_qty}}"></input></td>
                                                    <td class="col-md-1"><a class="btn btn-danger rounded"><i class="fas fa-trash text-light"></i></a></td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('product-packages.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit" {{$buttons['Update']}}>Save Changes</button>
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
                window.location.href = "{{ route('product-packages.index') }}";
            })
        </script>
        @endif
        
        <script src="{{asset('js/product-item/itemListModal.js')}}"></script>
        <script src="{{asset('js/product-package/getSelectedItems.js')}}"></script>
    @endsection