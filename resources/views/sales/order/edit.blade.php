@extends('partials.header')
@section('content')
@include('sales.quotation.package-list-modal')
@include('sales.quotation.item-list-modal')
    <div class="w-100 p-3">
        <h2>Edit Order</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Sales</li>
                    <li class="breadcrumb-item "><a href="{{ route('order.index') }}" class="text-decoration-none">Order</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Order</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="{{ route('sales-order.update', $sales_order->id)  }}" method="POST" class="d-flex flex-column w-100">
            @method('PUT')
            @csrf
                <div class="accordion accordion-flush mb-2" id="accordion-flush-order">
                    <div class="accordion-order border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-order" aria-expanded="true" aria-controls="flush-order">
                                Order Information 
                            </button>
                        </h2>
                        <div id="flush-order" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-order">
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Order Number</label>
                                        <input class="form-control" type="text" name="order_control_no" value="{{$sales_order->order_control_no}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Quotation Number</label>
                                        <select name="quotation_id" id="selectQuotation" class="form-control">
                                            <option value="">Select Quotation Number</option>
                                            @foreach ($quotation_numbers as $quote)
                                                <option value="{{$quote->id}}" {{$sales_order->quotation_id == $quote->id ? 'selected' : ''}}>
                                                    {{$quote->quote_control_number}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('quotation_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Branch</label>
                                        <select name="branch_id" id="selectBranch" class="form-control">
                                            <option value="">Select Branch</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{$branch->id}}" {{ $branch->id == $sales_order->branch_id ? 'selected': ''}}>{{$branch->branch_name}}</option>
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
                                        <label for="" class="form-label">Client Name</label>
                                        <select name="client_id" id="selectClient" class="form-control">
                                            <option value="">Select Client</option>
                                            @foreach ($clients as $client)
                                            <option value="{{$client->id}}" {{($sales_order->client_id == $client->id) ? "selected" :"" }}> {{ $client->client_full_name }}</option>
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
                                        <label for="" class="form-label">Date</label>
                                        <input type="date" name="order_date" class="form-control" value="{{ $sales_order->order_date}}"> 
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Full Name</label>
                                    <input class="form-control" type="text" name="order_name" id="clientName" value="{{ $sales_order->client->client_full_name }}" readonly>
                                    @error('order_name')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Email</label>
                                    <input class="form-control" type="text" name="order_email" id="clientEmail" value="{{ $sales_order->client->client_email }}" readonly>
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
                                    <input class="form-control" type="text" name="order_contact_no" id="clientContactNo" value="{{ $sales_order->client->client_mobile_no }}" readonly>
                                    @error('order_contact_no')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Address</label>
                                    <input class="form-control" type="text" id="client_address" name="order_address" value="{{ $sales_order->client->client_full_address }}" readonly>
                                    @error('order_address')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="order_remarks" id="remarks" cols="30" rows="2" value="{{ $sales_order->order_remarks }}">{{ $sales_order->order_remarks }}</textarea>
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
                        <div id="flush-payment" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-payment">
                            
                            <div class="row d-flex box-row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Payment Type</label>
                                        <select name="payment_type" id="" class="form-control">
                                            <option value="">Select Payment Type</option>
                                            @foreach ($payment_type as $key => $value) 
                                                <option value="{{$key}}" {{ ($key == $sales_order->payment_type) ? 'selected': '' }}>{{$value}}</option>
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
                                        <label for="" class="form-label">Payment Status</label>
                                        <select name="payment_status" id="" class="form-control">
                                            <option value="">Select Payment Status</option>
                                            @foreach ($payment_status as $key => $value)
                                                <option value="{{$key}}" {{ ($key == $sales_order->payment_status) ? 'selected': '' }}>{{$value}}</option>
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
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Material Cost</label>
                                        <input class="form-control material_cost" type="number" name="order_material_cost" value="{{ number_format($sales_order->order_material_cost, 2, '.', ',') }}" id="material_cost" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Labor Cost</label>
                                        <input type="number" name="order_labor_total" class="form-control labor_cost" value="{{ number_format($sales_order->order_labor_cost, 2, '.', ',') }}" id="labor_cost">
                                        @error('order_labor_total')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Others</label>
                                        <input type="number" name="order_other_cost" class="form-control other_cost" value="{{ number_format($sales_order->order_other_cost, 2, '.', ',') }}" id="other_cost" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Sub Total</label>

                                        <!-- <input class="form-control" type="text" id="order_sub_total" name="order_sub_total" value="{{ $sales_order->order_sub_total }}" readonly> -->

                                        <input class="form-control sub_total_cost" type="number" id="sub_total_cost"  name="order_sub_total" value="{{ number_format($sales_order->order_sub_total, 2, '.', ',') }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Discount</label>
                                        <input type="number" name="order_discount" class="form-control discount_cost" value="{{ number_format($sales_order->order_discount, 2, '.', ',') }}" id="discount_cost">
                                        @error('order_discount')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">VAT</label>
                                    <input type="checkbox" name="is_vat" class="form-check-input" id="is_vat" value="" {{($sales_order->is_vat == 1) ? "checked" :""}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Vat Percentage</label>
                                    <input type="number" name="vat_percent" class="form-control vat_percent" value="{{ $sales_order->vat_percentage }}" id="vat_percent" {{($sales_order->is_vat == 0) ? "readonly" :""}} >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">EWT Percentage</label>
                                    <input type="number" name="ewt_percent" class="form-control ewt_percent" value="{{ $sales_order->ewt_percentage }}" id="ewt_percent" {{($sales_order->is_vat == 0) ? "readonly" :""}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Vat Amount</label>
                                    <input type="number" name="vat_amount" class="form-control vat_amount" value="{{ number_format($sales_order->vat_amount, 2, '.', ',') }}" id="vat_amount" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">EWT Amount</label>
                                    <input type="number" name="ewt_amount" class="form-control ewt_amount" value="{{ number_format($sales_order->ewt_amount, 2, '.', ',') }}" id="ewt_amount" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Total Amount</label>
                                    <input type="number" name="order_total_amount" class="form-control" id="total_amount" value="{{ number_format($sales_order->order_total_amount, 2, '.', ',') }}" readonly>
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
                                        <?php $rowOrderedCount = 1?>
                                        @foreach ($order_details as $order_detail)
                                            {{-- for package parent --}}
                                            @if ($order_detail->item_id == 0)
                                                <tr class="itemRow">
                                                    <td class="col-md-1">{{$rowOrderedCount}}</td>
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][item_id]" value="{{ $order_detail->item_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][package_id]" value="{{ $order_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][is_package]" value="{{ $order_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="item[{{$rowOrderedCount}}][is_additional]" value="0">
                                                    <td class="col-md-4">{{ $order_detail->package->pack_name}}</td>
                                                    <td class="col-md-1">PACKAGE</td>
                                                    <td class="col-md-2"><input class="form-control quantity" id="{{$order_detail->package_id}}" type="text" name="item[{{$rowOrderedCount}}][item_qty]" value="{{ $order_detail->order_qty}}"></td>
                                                    <td class="col-md-2"><input class="form-control price" type="text" name="item[{{$rowOrderedCount}}][order_amount]" value="{{ number_format($order_detail->order_amount, 2, '.', ',') }}"></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="item[{{$rowOrderedCount}}][order_total_amount]" value="{{ number_format($order_detail->order_total_amount, 2, '.', ',')}}" readonly></td>
                                                    <td> 
                                                        <button class="btn btn-danger removeItem" data-pack="pack-{{$order_detail->package_id}}" type="button" id="{{$rowOrderedCount}}"> <i class="fa-solid fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            {{-- for package details --}}
                                            @elseif ($order_detail->item_id !== 0 && $order_detail->is_package > 0)
                                                <tr class="itemRow pack-{{$order_detail->package_id}}">
                                                    <td class="col-md-1">{{$rowOrderedCount}}</td>
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][item_id]" value="{{ $order_detail->item_id}}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][package_id]" value="{{ $order_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][is_package]" value="{{ $order_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="item[{{$rowOrderedCount}}][is_additional]" value="0">
                                                    <td class="col-md-4">{{ $order_detail->item->product_name }}</td>
                                                    <td class="col-md-1">{{ $order_detail->item->uom->uom_shortname }}</td>
                                                    <td class="col-md-2"><input class="form-control quantity pack_{{$order_detail->package_id}}" type="text" name="item[{{$rowOrderedCount}}][item_qty]" value="{{ $order_detail->order_qty}}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control price pack_{{$order_detail->package_id}}" type="text" name="item[{{$rowOrderedCount}}][order_amount]" value="{{ number_format($order_detail->order_amount, 2, '.', ',') }}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="item[{{$rowOrderedCount}}][order_total_amount]" value="{{ number_format($order_detail->order_total_amount, 2, '.', ',')}}" readonly></td>
                                                </tr> 
                                                
                                            {{-- for items --}}
                                            @elseif ($order_detail->item_id > 0 && $order_detail->is_package == 0)
                                                <tr class="itemRow">
                                                    <td class="col-md-1">{{$rowOrderedCount}}</td>
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][item_id]" value="{{ $order_detail->item_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][package_id]" value="{{ $order_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$rowOrderedCount}}][is_package]" value="{{ $order_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="item[{{$rowOrderedCount}}][is_additional]" value="0">
                                                    <td class="col-md-4">{{ $order_detail->item->product_name }}</td>
                                                    <td class="col-md-1">{{ $order_detail->item->uom->uom_shortname }}</td>
                                                    <td class="col-md-2"><input class="form-control quantity" type="text" name="item[{{$rowOrderedCount}}][item_qty]" value="{{ $order_detail->order_qty}}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control price" type="text" name="item[{{$rowOrderedCount}}][order_amount]" value="{{ number_format($order_detail->order_amount, 2, '.', ',') }}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="item[{{$rowOrderedCount}}][order_total_amount]" value="{{ number_format($order_detail->order_total_amount, 2, '.', ',')}}" readonly></td>
                                                    <td> 
                                                        <button class="btn btn-danger removeItem" type="button" id="{{$rowOrderedCount}}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                            <?php $rowOrderedCount++?>
                                        @endforeach
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
                                        <?php $rowAdditionalCount = 1?>
                                         @foreach ($order_additional as $order_detail)
                                            {{-- for package parent --}}
                                            @if ($order_detail->item_id == 0)
                                                <tr class="itemRow">
                                                    <td class="col-md-1">{{$rowAdditionalCount}}</td>
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][item_id]" value="{{ $order_detail->item_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][package_id]" value="{{ $order_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][is_package]" value="{{ $order_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="additionalItem[{{$rowAdditionalCount}}][is_additional]" value="1">
                                                    <td class="col-md-4">{{ $order_detail->package->pack_name}}</td>
                                                    <td class="col-md-1">PACKAGE</td>
                                                    <td class="col-md-2"><input class="form-control quantity" id="{{$order_detail->package_id}}" type="text" name="additionalItem[{{$rowAdditionalCount}}][item_qty]" value="{{ $order_detail->order_qty}}"></td>
                                                    <td class="col-md-2"><input class="form-control price" type="text" name="additionalItem[{{$rowAdditionalCount}}][order_amount]" value="{{ number_format($order_detail->order_amount, 2, '.', ',')}}"></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="additionalItem[{{$rowAdditionalCount}}][order_total_amount]" value="{{ number_format($order_detail->order_total_amount, 2, '.', ',')}}" readonly></td>
                                                    
                                                    <td> 
                                                        <button class="btn btn-danger removeItem" data-pack="pack-{{$order_detail->package_id}}" type="button" id="{{$rowAdditionalCount}}"> <i class="fa-solid fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            {{-- for package details --}}
                                            @elseif ($order_detail->item_id !== 0 && $order_detail->is_package > 0)
                                                <tr class="itemRow pack-{{$order_detail->package_id}}">
                                                    <td class="col-md-1">{{$rowAdditionalCount}}</td>
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][item_id]" value="{{ $order_detail->item_id}}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][package_id]" value="{{ $order_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][is_package]" value="{{ $order_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="additionalItem[{{$rowAdditionalCount}}][is_additional]" value="1">
                                                    <td class="col-md-4">{{ $order_detail->item->product_name }}</td>
                                                    <td class="col-md-1">{{ $order_detail->item->uom->uom_shortname }}</td>
                                                    <td class="col-md-2"><input class="form-control quantity pack_{{$order_detail->package_id}}" type="text" name="additionalItem[{{$rowAdditionalCount}}][item_qty]" value="{{ $order_detail->order_qty}} " readonly></td>
                                                    <td class="col-md-2"><input class="form-control price pack_{{$order_detail->package_id}}" type="text" name="additionalItem[{{$rowAdditionalCount}}][order_amount]" value="{{ number_format($order_detail->order_amount, 2, '.', ',')}}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="additionalItem[{{$rowAdditionalCount}}][order_total_amount]" value="{{ number_format($order_detail->order_total_amount, 2, '.', ',')}}" readonly></td>
                                                </tr> 
                                                
                                            {{-- for items --}}
                                            @elseif ($order_detail->item_id > 0 && $order_detail->is_package == 0)
                                                <tr class="itemRow">
                                                    <td class="col-md-1">{{$rowAdditionalCount}}</td>
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][item_id]" value="{{ $order_detail->item_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][package_id]" value="{{ $order_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="additionalItem[{{$rowAdditionalCount}}][is_package]" value="{{ $order_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="additionalItem[{{$rowAdditionalCount}}][is_additional]" value="1">
                                                    <td class="col-md-4">{{ $order_detail->item->product_name }}</td>
                                                    <td class="col-md-1">{{ $order_detail->item->uom->uom_shortname }}</td>
                                                    <td class="col-md-2"><input class="form-control quantity" type="text" name="additionalItem[{{$rowAdditionalCount}}][item_qty]" value="{{ $order_detail->order_qty}} " readonly></td>
                                                    <td class="col-md-2"><input class="form-control price" type="text" name="additionalItem[{{$rowAdditionalCount}}][order_amount]" value="{{ number_format($order_detail->order_amount, 2, '.', ',')}}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="additionalItem[{{$rowAdditionalCount}}][order_total_amount]" value="{{ number_format($order_detail->order_total_amount, 2, '.', ',')}}" readonly></td>
                                                    <td> 
                                                        <button class="btn btn-danger removeItem" type="button" id="{{$rowAdditionalCount}}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                            <?php $rowAdditionalCount++?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('order.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="submitButton" {{$buttons['Update']}}>Submit</button>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="saveButton" {{$buttons['Update']}}>Save Changes</button>
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
    <script src="{{asset('js/salesOrder/removeItem.js')}}"></script>
@endsection
