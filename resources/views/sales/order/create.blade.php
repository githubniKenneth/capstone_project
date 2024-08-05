@extends('partials.header')



@section('content')
@include('sales.quotation.package-list-modal')
@include('sales.quotation.item-list-modal')
    <div class="w-100 p-3">
        <h2>Add New Order</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Sales</li>
                    <li class="breadcrumb-item "><a href="{{ route('order.index') }}" class="text-decoration-none">Order</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Order</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="{{ route('order.store') }}" method="POST" class="d-flex flex-column w-100">
            @csrf
                <div class="accordion accordion-flush mb-2" id="accordion-flush-order">
                    <div class="accordion-order border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-order" aria-expanded="true" aria-controls="flush-order">
                                Order Information 
                            </button>
                        </h2>
                        <div id="flush-order" class="accordion-collapse collapse show accordion-box" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-order">
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Order Number</label>
                                        <input class="form-control d-none" type="text" name="order_number" value="" readonly>
                                        <input class="form-control" type="text" name="order_control_no" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Quotation Number <span class="text-danger">*</span></label>
                                        <select name="quotation_id" id="selectQuotation" class="form-control">
                                            <option value="">Select Quotation Number</option>
                                            @foreach ($quotation_numbers as $quote)
                                                <option value="{{$quote->id}}" {{ old('quotation_id') == $quote->id ? 'selected' : '' }}>{{$quote->quote_control_number}}</option>
                                            @endforeach
                                        </select>
                                        @error('quotation_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Branch <span class="text-danger">*</span></label>
                                        <select name="branch_id" id="selectBranch" class="form-control">
                                            <option value="">Select Branch</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{$branch->id}}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{$branch->branch_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Date <span class="text-danger">*</span></label>
                                        <input type="date" name="order_date" class="form-control" value="{{ now()->format('Y-m-d') }}"> 
                                    </div>
                                </div>
                            </div> 
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Client Name <span class="text-danger">*</span></label>
                                            <select name="client_id" id="selectClient" class="form-control">
                                                <option value="">Select Client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{$client->id}}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{($client->client_full_name == "" ? "$client->client_business_name" : "$client->client_full_name")}}</option>
                                                @endforeach
                                            </select>
                                            @error('client_id')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Full Name</label>
                                        <input class="form-control" type="text" name="order_name" id="clientName" value="{{ old('order_name') }}" readonly>
                                        @error('order_name')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>  
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Email</label>
                                        <input class="form-control" type="text" name="order_email" id="clientEmail" value="{{ old('order_email') }}" readonly>
                                        @error('order_email')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Contact Number</label>
                                        <input class="form-control" type="text" name="order_contact_no" id="clientContactNo" value="{{ old('order_contact_no') }}" readonly>
                                        @error('order_contact_no')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>  
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Address</label>
                                        <textarea class="form-control" type="text" id="client_address" name="order_address" cols="30" rows="2" readonly>{{ old('order_address') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="order_remarks" id="remarks" cols="30" rows="2">{{ old('order_remarks') }}</textarea>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush mb-2" id="accordion-flush-payment">
                    <div class="accordion-payment border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-payment" aria-expanded="true" aria-controls="flush-payment">
                                Payment Information 
                            </button>
                        </h2>
                        <div id="flush-payment" class="accordion-collapse collapse show accordion-box" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-payment">
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Payment Type <span class="text-danger">*</span></label>
                                        <select name="payment_type" id="" class="form-control">
                                            <option value="">Select Payment Type</option>
                                            @foreach ($payment_type as $key => $value)
                                                <option value="{{$key}}" {{ old('payment_type') == $key ? 'selected' : '' }}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_type')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Payment Status <span class="text-danger">*</span></label>
                                        <select name="payment_status" id="" class="form-control">
                                            <option value="">Select Payment Status</option>
                                            @foreach ($payment_status as $key => $value)
                                                <option value="{{$key}}" {{ old('payment_status') == $key ? 'selected' : '' }}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_status')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Material Cost</label>
                                        <input class="form-control material_cost" type="number" name="order_material_cost" value="0.00" id="material_cost" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Labor Cost</label>
                                        <input type="number" name="order_labor_cost" class="form-control labor_cost" value="0.00" id="labor_cost">
                                        @error('payment_status')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Others</label>
                                        <input type="number" name="order_other_cost" class="form-control other_cost" value="0.00" id="other_cost" readonly>
                                        @error('payment_status')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Sub Total</label>
                                        <input class="form-control sub_total_cost" type="number" name="order_sub_total" value="0.00" id="sub_total_cost" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Discount</label>
                                        <input type="number" name="order_discount" class="form-control discount_cost" value="0.00" id="discount_cost">
                                        @error('payment_status')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">VAT</label>
                                        <input type="checkbox" name="is_vat" class="form-check-input" id="is_vat">
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Vat Percentage</label>
                                        <input type="number" name="vat_percent" class="form-control vat_percent" value="0" id="vat_percent" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">EWT Percentage</label>
                                        <input type="number" name="ewt_percent" class="form-control ewt_percent" value="0" id="ewt_percent" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Vat Amount</label>
                                        <input type="number" name="vat_amount" class="form-control vat_amount" value="0.00" id="vat_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">EWT Amount</label>
                                        <input type="number" name="ewt_amount" class="form-control ewt_amount" value="0.00" id="ewt_amount" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Total Amount</label>
                                        <input type="number" name="order_total_amount" class="form-control" id="total_amount" value="0.00" readonly>
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
                                    <a href="{{ route('sales.package-list') }}" data-toggle="modal" id="packageList" data-button-name="itemDetails" data-target="#packageListModal" title="Show Packages"
                                        class="btn btn-success rounded">
                                            Show Package  List
                                    </a>
                                    <a href="{{ route('product.item-list') }}" data-toggle="modal" id="itemList" data-button-name="itemDetails" data-target="#itemListModal" title="Show Items"
                                        class="btn btn-success rounded" style="margin-left: 30px;">
                                            Show Item List
                                    </a>
                                </div>
                                @error('item')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                                <table class="table" id="itemDetailsTable">
                                    <thead>
                                    <tr>
                                        <td class="col-md-1">No</td>
                                        <td class="col-md-4">Item Name</td>
                                        <td class="col-md-1">Unit</td>
                                        <td class="col-md-2">Qty</td>
                                        <td class="col-md-2">Price</td>
                                        <td class="col-md-2">Total Price</td>
                                        <td class="col-md-1">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody id="selectedDataList">
                                        
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush mb-2" id="accordion-flush-additional-items">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-additional-items" aria-expanded="true" aria-controls="flush-additional-items">
                                Additional Item Details
                            </button>
                        </h2>
                    <div id="flush-additional-items" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-additional-items">
                        <div class="p-3">
                                <div class="d-flex justify-content-end pb-4" style="margin-left: 20px; margin-bottom: 20px; font-size: 20px; margin-top: 10px;">
                                    <a href="{{ route('sales.package-list') }}" data-toggle="modal" id="packageList" data-button-name="additionalDetails" data-target="#packageListModal" title="Show Packages"
                                        class="btn btn-success rounded">
                                            Show Package  List
                                    </a>
                                    <a href="{{ route('product.item-list') }}" data-toggle="modal" id="itemList" data-button-name="additionalDetails" data-target="#itemListModal" title="Show Items"
                                        class="btn btn-success rounded" style="margin-left: 30px;">
                                            Show Item List
                                    </a>
                                </div>
                                <table class="table" id="AddiotnalItemDetailsTable">
                                    <thead>
                                    <tr>
                                        <td class="col-md-1">No</td>
                                        <td class="col-md-4">Item Name</td>
                                        <td class="col-md-1">Unit</td>
                                        <td class="col-md-2">Qty</td>
                                        <td class="col-md-2">Price</td>
                                        <td class="col-md-2">Total Price</td>
                                        <td class="col-md-1">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody id="selectedAdditionalDataList">
                                        
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('order.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="submitButton">Submit</button>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="saveButton">Save Changes</button>
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
                window.location.href = "{{ route('order.index') }}";
            })
        </script>
        @endif
@endsection



@section('script')
    
    <script src="{{asset('js/product-item/itemListModal.js')}}"></script>
    <script src="{{asset('js/product-item/packageListModal.js')}}"></script>

    <script src="{{asset('js/salesOrder/getSelectedItems.js')}}"></script>
    <script src="{{asset('js/salesQuotation/clientDetails.js')}}"></script>
    <script src="{{asset('js/salesQuotation/amountFunctionality.js')}}"></script>
    <script src="{{asset('js/salesOrder/selectQuotation.js')}}"></script>
@endsection
