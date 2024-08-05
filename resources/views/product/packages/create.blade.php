@extends('partials.header')


@section('content')
@include('product.item.item-list-modal')

    <div class="w-100 p-3">
        <h2>Add New Package</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Product</li>
                    <li class="breadcrumb-item "><a href="{{ route('product-item.index') }}" class="text-decoration-none">Items</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Package</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="{{ route('product-packages.store') }}" method="POST" class="d-flex flex-column w-100">
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
                                        <input class="form-control" type="text" name="pack_name" value="{{ old('pack_name') }}">
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
                                        <input class="form-control" type="text" name="camera_number" value="{{ old('camera_number') }}">
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
                                        <input class="form-control" type="text" name="pack_price" value="{{ old('pack_price') }}">
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
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Resolution</label>
                                        <select name="resolution_id" id="" class="form-select">
                                            <option value="">Select Group</option>
                                            @foreach ($camera_resolutions as $resolution)
                                                <option value="{{$resolution->id}}" {{ old('resolution_id') == $resolution->id ? 'selected' : '' }}>{{$resolution->resolution_desc}}</option>
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
                                        <textarea class="form-control" name="pack_description" id="" cols="30" rows="2">{{ old('pack_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="pack_remarks" id="" cols="30" rows="2">{{ old('pack_remarks') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Technical Specifications</label>
                                        <textarea class="form-control" name="technical_specification" id="" cols="30" rows="2">{{ old('technical_specification') }}</textarea>
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
                                            <td class="col-md-4">Item Name</td>
                                            <td class="col-md-2">Unit</td>
                                            <td class="col-md-2">Price</td>
                                            <td class="col-md-2">Qty</td>
                                            <td class="col-md-1">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="selectedDataList">
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                        <a href="{{ route('branch.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit">Save Changes</button>
                        </div>
                    </div>
                </div>

                
                
            </form>
        </div>
    </div>

    

    <script src="{{asset('js/product-item/itemListModal.js')}}"></script>

    <script src="{{asset('js/product-package/getSelectedItems.js')}}"></script>
@endsection

@section('script')

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
@endsection
