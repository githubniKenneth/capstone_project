@extends('partials.header')

@include('product.item.item-list-modal')

@section('content')

    <div class="w-100 p-3">
        <h2>Edit Receives</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Inventory</li>
                    <li class="breadcrumb-item "><a href="{{ route('receive.index') }}" class="text-decoration-none">Receives</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Receives</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="/inventory/receive/{{ $inv_received->id }}" method="POST" class="d-flex flex-column w-100">
            @method('PUT')
            @csrf
                <div class="accordion accordion-flush mb-2" id="accordion-flush-item">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item" aria-expanded="true" aria-controls="flush-item">
                                Receiving Information 
                            </button>
                        </h2>
                        <div id="flush-item" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item">
                            <div class="row d-flex p-3">
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Control Number</label>
                                        <input class="form-control" type="text" name="rec_code" value="{{ $inv_received->rec_code }}" readonly>
                                        @error('rec_code')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Supplier <span class="required-field">*</span></label>
                                        <input class="form-control" type="text" name="rec_supplier" value="{{ $inv_received->rec_supplier }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Date</label>
                                        <input type="date" name="rec_date" class="form-control" value="{{ $inv_received->rec_date }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="rec_remarks" id="" cols="30" rows="2">{{ $inv_received->rec_remarks }}</textarea>
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
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td class="col-md-5">Item Name</td>
                                        <td class="col-md-2">Unit</td>
                                        <td class="col-md-2">Qty</td>
                                        <td class="col-md-1">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody id="selectedDataList">
                                        @foreach($received_details as $details)
                                            <tr>
                                                <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][item_id]" value='{{$details->item_id}}' class="col-md-5">asd</input>
                                                <td class="col-md-5">{{$details->item->product_name}}</td>
                                                <td class="col-md-2">{{$details->item->uom->uom_shortname}}</td>
                                                <td class="col-md-2"><input class="form-control" type="text" name="item[{{$loop->iteration}}][item_qty]" value="{{$details->rec_qty}}"></input></td>
                                                <td class="col-md-1">
                                                    <button class="btn btn-danger removeItem" type="button" id="{{$loop->iteration}}" {{$inv_received->is_posted == 1 ? 'disabled':''}}> 
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </td>
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
                            <a href="{{ route('receive.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="submitButton" {{$inv_received->is_posted == 1 ? 'disabled':''}} {{$buttons['Update']}}>Submit</button>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="saveButton" {{$inv_received->is_posted == 1 ? 'disabled':''}} {{$buttons['Update']}}>Save Changes</button>
                        </div>
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
                window.location.href = "{{ route('receive.index') }}";
            })
        </script>
        @endif
@endsection

@section('script')
    <script src="{{asset('js/product-item/itemListModal.js')}}"></script>

    <script src="{{asset('js/inv-receiving/getSelectedItems.js')}}"></script>
    <script src="{{asset('js/inv-receiving/removeItem.js')}}"></script>
@endsection
