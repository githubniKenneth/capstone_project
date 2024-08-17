@extends('partials.header')

@section('content')
@include('sales.quotation.package-list-modal')
@include('sales.quotation.item-list-modal')
    <div class="w-100 p-3">
        <h2>Edit Quotation</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Sales</li>
                    <li class="breadcrumb-item "><a href="{{ route('sales-quotation.index') }}" class="text-decoration-none">Quotation</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Quotation</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="{{ route('sales-quotation.update', ['id' => $data['quotation']->id]) }}" method="POST" class="d-flex flex-column w-100">
            @method('PUT')
            @csrf

            <div class="accordion accordion-flush mb-2" id="accordion-flush-client">
                <div class="accordion-item border">
                    <h2 class="accordion-header mb-2" id="flush-headingOne">
                        <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-client" aria-expanded="true" aria-controls="flush-client">
                            Client Information 
                        </button>
                    </h2>
                    <div id="flush-client" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-client">
                        <div class="row d-flex p-3">
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Quotation Number</label>
                                    <input class="form-control d-none" type="text" name="quote_number" value="{{ $data['quotation']->quote_number }}" readonly>
                                    <input class="form-control" type="text" name="quote_control_number" value="{{ $data['quotation']->quote_control_number }}" readonly>
                                    @error('quote_number')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" name="quote_date" class="form-control" value="{{ $data['quotation']->quote_date }}">
                                    @error('quote_date')
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
                                    <label for="" class="form-label">Branch</label>
                                    <select name="branch_id" id="selectBranch" class="form-control">
                                        <option value="">Select Branch</option>
                                        @foreach ($data['branches'] as $branch)
                                            <option value="{{$branch->id}}" {{ $branch->id == $data['quotation']->branch_id ? 'selected': ''}}>{{$branch->branch_name}}</option>
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
                                            @foreach ($data['clients'] as $client)
                                                <option value="{{$client->id}}" {{ ( $data['quotation']->client_id == $client->id) ? "selected" :"" }}> {{$client->client_business_name}} </option>
                                            @endforeach
                                    </select>
                                    @error('quote_name')
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
                                    <label for="" class="form-label">Full Name</label>
                                    <input class="form-control" type="text" name="quote_name" id="clientName" value = "{{ $data['quotation']->client->client_full_name }}" readonly>
                                    @error('quote_name')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Email</label>
                                    <input class="form-control" type="text" name="quote_email" id="clientEmail" value = "{{ $data['quotation']->client->client_email }}" readonly>
                                    @error('quote_email')
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
                                    <label for="" class="form-label">Contact Number</label>
                                    <input class="form-control" type="text" name="quote_contact_no" id="clientContactNo" value = "{{ $data['quotation']->client->client_mobile_no }}" readonly>
                                    @error('quote_contact_no')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Address</label>
                                    <input class="form-control" type="text" id="client_address" name="quote_address" value = "{{ $data['quotation']->client->client_full_address }}" readonly>
                                    @error('quote_address')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex p-3">
                            <div class="col-md-12">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" id="" cols="30" rows="2">{{ $data['quotation']->remarks }}</textarea>
                                    @error('remarks')
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
            <div class="accordion accordion-flush mb-2" id="accordion-flush-item">
                <div class="accordion-item border">
                    <h2 class="accordion-header mb-2" id="flush-headingOne">
                        <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item" aria-expanded="true" aria-controls="flush-item">
                            Requested Quotation
                        </button>
                    </h2>
                    <div id="flush-item" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item">
                        <div class="row d-flex p-3">
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Preferred Brand</label>
                                    <select name="brand_id" id="" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach ($data['brands'] as $brand)
                                            <option value="{{$brand->id}}" {{ ( $data['quotation']->brand_id == $brand->id) ? "selected" :"" }}> {{$brand->brand_name}} </option>
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
                                    <label for="" class="form-label">Preferred Resolution</label>
                                    <select name="resolution_id" id="" class="form-control">
                                        <option value="">Select Resolution</option>
                                        @foreach ($data['resolutions'] as $resolution)
                                            <option value="{{$resolution->id}}" {{ ( $data['quotation']->resolution_id == $resolution->id) ? "selected" :"" }}> {{$resolution->resolution_desc}} </option>
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
                                    <label for="" class="form-label">Preferred Type of Installation</label>
                                    <input class="form-control" type="text" name="installation_type" >
                                    @error('installation_type')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Number of channels</label>
                                        <input class="form-control" type="text" name="channel_id" value="{{$data['quotation']->channel_id}}">
                                        @error('channel_id')
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
                                    <label for="" class="form-label">Number of Indoor Camera</label>
                                    <input class="form-control" type="text" name="indoor_cam_no" value="{{$data['quotation']->indoor_cam_no}}">
                                    @error('indoor_cam_no')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Number of Outdoor Camera</label>
                                    <input class="form-control" type="text" name="outdoor_cam_no" value="{{$data['quotation']->outdoor_cam_no}}">
                                    @error('outdoor_cam_no')
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
            <div class="accordion accordion-flush mb-2" id="accordion-flush-payment">
                <div class="accordion-payment border">
                    <h2 class="accordion-header mb-2" id="flush-headingOne">
                        <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-payment" aria-expanded="true" aria-controls="flush-payment">
                            Payment Information 
                        </button>
                    </h2>
                    <div id="flush-payment" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-payment">
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Material Cost</label>
                                        <input class="form-control material_cost" type="number" name="material_cost" value="{{ $data['quotation']->quote_material_cost }}" id="material_cost" readonly>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Labor Cost</label>
                                        <input type="number" name="labor_cost" class="form-control labor_cost" value="{{$data['quotation']->quote_labor_cost}}" id="labor_cost">
                                        @error('labor_cost')
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
                                        <label for="" class="form-label">Others</label>
                                        <input type="number" name="other_cost" class="form-control other_cost" value="{{$data['quotation']->quote_other_cost}}" id="other_cost">
                                        @error('other_cost')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Sub Total</label>
                                        <input class="form-control sub_total_cost" type="number" name="sub_total_cost" value="{{$data['quotation']->quote_sub_total}}" id="sub_total_cost" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Discount</label>
                                            <input type="number" name="discount_cost" class="form-control discount_cost" value="{{$data['quotation']->quote_discount}}" id="discount_cost">
                                            @error('outdoor_cam_no')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">VAT</label>
                                            <input type="checkbox" name="is_vat" class="form-check-input" id="is_vat" {{($data['quotation']->is_vat == 1) ? "checked" :""}}>
                                        </div>
                                    </div>
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Vat Percentage</label>
                                        <input type="number" name="vat_percent" class="form-control vat_percent" value="{{$data['quotation']->vat_percentage}}" id="vat_percent" {{($data['quotation']->is_vat == 0) ? "readonly" :"" }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">EWT Percentage</label>
                                        <input type="number" name="ewt_percent" class="form-control ewt_percent" value="{{$data['quotation']->ewt_percentage}}" id="ewt_percent" >
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Vat Amount</label>
                                        <input type="number" name="vat_amount" class="form-control vat_amount" value="{{$data['quotation']->vat_amount}}" id="vat_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">EWT Amount</label>
                                        <input type="number" name="ewt_amount" class="form-control ewt_amount" value="{{$data['quotation']->ewt_amount}}" id="ewt_amount" readonly>
                                    </div>
                                </div>
                            </div>

                                
                            <div class="row d-flex p-3">   
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Total Amount</label>
                                        <input type="number" name="total_amount" class="form-control" id="total_amount" value="{{$data['quotation']->total_amount}}" readonly>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush mb-2" id="accordion-flush-item-details">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item-details" aria-expanded="true" aria-controls="flush-item-details">
                                Item Details
                            </button>
                        </h2>
                        <div id="flush-item-details" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item-details">
                            <div class="p-3">
                                <div class="d-flex justify-content-end pb-4" style="margin-left: 20px; margin-bottom: 20px; font-size: 20px; margin-top: 10px;">
                                    <a href="{{ route('sales.package-list') }}" data-toggle="modal" id="packageList" data-target="#packageListModal" title="Show Packages"
                                        class="btn btn-success rounded">
                                            Show Package  List
                                    </a>
                                    <a href="{{ route('product.item-list') }}" data-toggle="modal" id="itemList" data-target="#itemListModal" title="Show Items"
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
                                            <td class="col-md-3">Item Name</td>
                                            <td class="col-md-1">Unit</td>
                                            <td class="col-md-2">Qty</td>
                                            <td class="col-md-2">Price</td>
                                            <td class="col-md-2">Total Price</td>
                                            <td class="col-md-1">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="selectedDataList">
                                        <?php $rowCount = 1?>
                                        @foreach ($data['quotation_details'] as $quotation_detail)
                                            {{-- for items --}}
                                            @if ($quotation_detail->item_id > 0 && $quotation_detail->is_package == 0)
                                                <tr class="itemRow">
                                                    <td class="col-md-1"> {{$loop->iteration}} </td>
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][item_id]" value="{{ $quotation_detail->item_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][package_id]" value="{{ $quotation_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][is_package]" value="{{ $quotation_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="item[{{$loop->iteration}}][is_additional]" value="0">
                                                    <td class="col-md-4">{{ $quotation_detail->item->product_name}}</td>
                                                    <td class="col-md-2">{{ $quotation_detail->item->uom->uom_shortname}}</td>
                                                    <td class="col-md-2"><input class="form-control quantity" type="text" name="item[{{$loop->iteration}}][item_qty]" value="{{ $quotation_detail->quote_qty}} "></td>
                                                    <td class="col-md-2"><input class="form-control price" type="text" name="item[{{$loop->iteration}}][order_amount]" value="{{ $quotation_detail->quote_amount }}"></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="item[{{$loop->iteration}}][order_total_amount]" value="{{ $quotation_detail->quote_total_amount}}" readonly>
                                                    </td>
                                                    <td> 
                                                        <button class="btn btn-danger removeItem" type="button" id="{{$rowCount}}"> <i class="fa-solid fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            {{-- for package details --}}
                                            @elseif ($quotation_detail->item_id !== 0 && $quotation_detail->is_package > 0)
                                                <tr class="itemRow pack-{{$quotation_detail->package_id}}">
                                                    <td class="col-md-1"> {{$loop->iteration}} </td>
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][item_id]" value="{{ $quotation_detail->item_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][package_id]" value="{{ $quotation_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][is_package]" value="{{ $quotation_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="item[{{$loop->iteration}}][is_additional]" value="0">
                                                    <td class="col-md-4">{{ $quotation_detail->item->product_name}}</td>
                                                    <td class="col-md-2">{{ $quotation_detail->item->uom->uom_shortname}}</td>
                                                    <td class="col-md-2"><input class="form-control quantity pack_{{$quotation_detail->package_id}}" type="text" name="item[{{$loop->iteration}}][item_qty]" value="{{ $quotation_detail->quote_qty}}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control price pack_{{$quotation_detail->package_id}}" type="text" name="item[{{$loop->iteration}}][order_amount]" value="{{ $quotation_detail->quote_amount}}" readonly></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="item[{{$loop->iteration}}][order_total_amount]" value="{{ $quotation_detail->quote_total_amount}}" readonly></td>
                                                </tr>
                                            {{-- for package parent --}}
                                            @elseif ($quotation_detail->item_id == 0)

                                                <tr class="itemRow">
                                                    <td class="col-md-1">{{$loop->iteration}}</td>
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][item_id]" value="{{ $quotation_detail->item_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][package_id]" value="{{ $quotation_detail->package_id }}" class="col-md-5">
                                                    <td class="col-md-2 d-none"><input name="item[{{$loop->iteration}}][is_package]" value="{{ $quotation_detail->is_package }}" class="col-md-5">
                                                    <td class="d-none"><input name="item[{{$loop->iteration}}][is_additional]" value="0">
                                                    <td class="col-md-4">{{ $quotation_detail->package->pack_name}}</td>
                                                    <td class="col-md-1">PACKAGE</td>
                                                    <td class="col-md-2"><input class="form-control quantity" type="text" name="item[{{$loop->iteration}}][item_qty]" id="{{$quotation_detail->package_id}}" value="{{ $quotation_detail->quote_qty}}"></td>
                                                    <td class="col-md-2"><input class="form-control price" type="text" name="item[{{$loop->iteration}}][order_amount]" value="{{ $quotation_detail->quote_amount }}"></td>
                                                    <td class="col-md-2"><input class="form-control totalAmount" type="text" name="item[{{$loop->iteration}}][order_total_amount]" value="{{ $quotation_detail->quote_total_amount}}" readonly></td>
                                                    <td> 
                                                        <button class="btn btn-danger removeItem" data-pack="pack-{{$quotation_detail->package_id}}" type="button" id="{{$rowCount}}"> 
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                        <?php $rowCount++?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>



                
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('sales-quotation.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="susbmit" name="action" value="submitButton" {{$buttons['Update']}}>Submit</button>
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
                window.location.href ="{{ route('quotation.index') }}";
            })
        </script>
        @endif
@endsection


@section('script')

<script src="{{asset('js/product-item/itemListModal.js')}}"></script>
<script src="{{asset('js/product-item/packageListModal.js')}}"></script>

<script src="{{asset('js/salesOrder/getSelectedItems.js')}}"></script>

<!-- <script src="{{asset('js/salesQuotation/amountFunctionality.js')}}"></script> -->
<script src="{{asset('js/salesQuotation/test.js')}}"></script>
<script src="{{asset('js/salesQuotation/dataTable.js')}}"></script>

<script src="{{asset('js/salesQuotation/clientDetails.js')}}"></script>
<script src="{{asset('js/salesQuotation/removeItem.js')}}"></script>
@endsection
