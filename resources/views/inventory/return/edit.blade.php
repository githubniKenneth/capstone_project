@extends('partials.header')



@section('content')
@include('sales.quotation.package-list-modal')
@include('product.item.item-list-modal')
    <div class="w-100 p-3">
        <h2>Edit Issuances</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Inventory</li>
                    <li class="breadcrumb-item "><a href="{{ route('issuances.index') }}" class="text-decoration-none">Issuances</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Issuances</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="{{route('issuances.update', $data->id)}}" method="POST" class="d-flex flex-column w-100">
            @method('PUT')
            @csrf
                <div class="accordion accordion-flush mb-2" id="accordion-flush-item">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item" aria-expanded="true" aria-controls="flush-item">
                                Issuance Information 
                            </button>
                        </h2>
                        <div id="flush-item" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item">
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Issuance Number</label>
                                        <input class="form-control" type="hidden" name="issuance_number" readonly>
                                        <input class="form-control" type="text" name="issuance_control_no" value="{{$data->issuance_control_no}}" readonly>
                                        @error('issuance_control_no')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Date</label>
                                        <input type="date" name="issuance_date" class="form-control" value="{{$data->issuance_date}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Employee</label>
                                        <select name="received_by" id="selectEmp" class="form-control">
                                            <option value="">Select Employee</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{$employee->id}}" {{$data->received_by == $employee->id ? "selected":""}}>{{$employee->emp_full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Branch</label>
                                        <select name="branch_id" id="" class="form-control">
                                            <option value="">Select Branch</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{$branch->id}}" {{$data->branch_id == $branch->id ? "selected":""}}>{{$branch->branch_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="" cols="30" rows="2">{{$data->remarks}}</textarea>
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
                                <div class="d-flex justify-content-end pb-4" style="margin-left: 20px; margin-bottom: 20px; font-size: 20px; margin-top: 10px;">
                                    <a href="{{ route('product.item-list') }}" data-toggle="modal" id="itemList" data-button-name="selectIssuances" data-target="#itemListModal" title="Show Items"
                                        class="btn btn-success rounded" style="margin-left: 30px;">
                                            Show Item List
                                    </a>
                                </div>
                                <table class="table" id="itemDetailsTable">
                                    <thead>
                                    <tr>
                                        <td class="col-md-1">No.</td>
                                        <td class="col-md-6">Item Name</td>
                                        <td class="col-md-2">Unit</td>
                                        <td class="col-md-2">Qty</td>
                                        <td class="col-md-1">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody id="selectedDataList">
                                        @foreach($item_details as $item)
                                            <tr id="{{$loop->iteration}}">
                                                <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][item_id]" value="{{$item->item_id}}" class="col-md-5">
                                                <td class="col-md-1">{{$loop->iteration}}</td>
                                                <td class="col-md-6">{{$item->item->product_name}}</td>
                                                <td class="col-md-2">{{$item->item->uom->uom_shortname}}</td>
                                                <td class="col-md-2"><input class="form-control quantity" type="number" id="" name="item[{{$loop->iteration}}][issued_qty]" value="{{$item->issued_qty}}"></td>
                                                <td class="col-md-1"><button class="btn btn-danger removeItem" type="button" id="{{$loop->iteration}}"><i class="fa-solid fa-trash"></i></button></td>
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
                            <!-- <button class="btn btn-primary rounded" type="submit" name="action" value="submitButton">Submit</button> -->
                            <button class="btn btn-primary rounded" type="submit" name="action" value="saveButton" disabled>Save Changes</button>
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
                window.location.href =  "{{ route('issuances.index') }}";
            })
        </script>
    @endif

@endsection

@section('script')
    <script src="{{asset('js/product-item/itemListModal.js')}}"></script>
    <script src="{{asset('js/product-item/packageListModal.js')}}"></script>
    <script src="{{asset('js/inv-receiving/removeItem.js')}}"></script>
    <script src="{{asset('js/salesOrder/getSelectedItems.js')}}"></script>
@endsection
