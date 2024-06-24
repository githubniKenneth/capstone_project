
@extends('partials.header')

@section('content')

@include('sales.quotation.package-list-modal')
@include('sales.quotation.item-list-modal')
    <div class="w-100 p-3" >
        <h2>Add Quotation</h2>
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Sales</li>
                    <li class="breadcrumb-item "><a href="{{ route('sales-quotation.index') }}" class="text-decoration-none">Quotation</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Quotation</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center" >
            <form action="{{ route('sales-quotation.store') }}" method="POST" class="d-flex flex-column w-100">
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
                                    <input class="form-control d-none" type="text" name="quote_number" value="{{$newQuoteNumber}}" readonly>
                                    <input class="form-control" type="text" name="quote_control_number" value="{{$newControlNo}}" readonly>
                                    @error('quote_control_number')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Date</label>
                                    <input type="date" name="quote_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
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
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('rec_code')
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
                                            <option value="{{$client->id}}">{{$client->client_business_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
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
                                    <input class="form-control" type="text" name="quote_name" id="clientName" readonly>
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
                                    <input class="form-control" type="text" name="quote_email" id="clientEmail" readonly>
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
                                    <input class="form-control" type="text" name="quote_contact_no" id="clientContactNo" readonly>
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
                                    <input class="form-control" type="text" id="client_address" name="quote_address" readonly>
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
                                    <textarea class="form-control" name="remarks" id="" cols="30" rows="2"></textarea>
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
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                                            @foreach ($resolutions as $resolution)
                                                <option value="{{$resolution->id}}">{{$resolution->resolution_desc}}</option>
                                            @endforeach
                                        </select>
                                        @error('resolution_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Preferred Type of Installation</label>
                                    <input class="form-control" type="text" name="installation_type">
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
                                        <input class="form-control" type="number" name="channel_id">
                                        @error('channel_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Number of Indoor Camera</label>
                                    <input class="form-control" type="number" name="indoor_cam_no">
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
                                    <input class="form-control" type="number" name="outdoor_cam_no">
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
                                    <input class="form-control material_cost" type="number" name="material_cost" value="0.00" id="material_cost" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Labor Cost</label>
                                    <input type="number" name="labor_cost" class="form-control labor_cost" value="0.00" id="labor_cost">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Others</label>
                                    <input type="number" name="other_cost" class="form-control other_cost" value="0.00" id="other_cost">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Sub Total</label>
                                    <input class="form-control sub_total_cost" type="number" name="sub_total_cost" value="0.00" id="sub_total_cost" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Discount</label>
                                    <input type="number" name="discount_cost" class="form-control discount_cost" value="0.00" id="discount_cost">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">VAT</label>
                                    <input type="checkbox" name="is_vat" class="form-check-input" id="is_vat">
                                </div>
                            </div>
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
                            <div class="col-md-6">
                                <div class="form-group d-flex flex-column">
                                    <label for="" class="form-label">Total Amount</label>
                                    <input type="number" name="total_amount" class="form-control" id="total_amount" value="0.00" readonly>
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
                                        
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                </div>



                
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('sales-quotation.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="susbmit" name="action" value="submitButton">Submit</button>
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
                window.location.href = "{{ route('sales-quotation.index') }}";
            })
        </script>
        @endif

@endsection


@section('script')

<script src="{{asset('js/product-item/itemListModal.js')}}"></script>
<script src="{{asset('js/product-item/packageListModal.js')}}"></script>

<script src="{{asset('js/salesOrder/getSelectedItems.js')}}"></script>
<script src="{{asset('js/salesQuotation/amountFunctionality.js')}}"></script>

<!-- <script src="{{asset('js/salesQuotation/dataTable.js')}}"></script> -->

<script src="{{asset('js/salesQuotation/clientDetails.js')}}"></script>

<!-- <script>
        $(document).ready(function() {
        // Function to update total amount
        function updateTotalAmount() {
            
            var sub_total_cost = parseFloat($('#sub_total_cost').val()) || 0;
            var labor_cost = parseFloat($('#labor_cost').val()) || 0;
            var other_cost = parseFloat($('#other_cost').val()) || 0;
            var discount_cost = parseFloat($('#discount_cost').val()) || 0;
            var totalAmount = sub_total_cost + labor_cost + other_cost - discount_cost;
            // console.log(labor_cost);
            // Update the total amount field
            $('#total_amount').val(totalAmount.toFixed(2)); // Assuming you want to display up to 2 decimal places
        }

        // update the total amount every input
        $('.sub_total_cost, .labor_cost, .other_cost, .discount_cost').on('input', function() {
            updateTotalAmount();
        });

        // Initial update
        updateTotalAmount();
        });
    </script>

    <script>
        $(document).ready(function() {

        $('#myTable').on('input', '.quantity, .price', function() {
            var $row = $(this).closest('tr'); // Find the closest row

            // Get values from the current row
            var quantity = parseFloat($row.find('.quantity').val()) || 0;
            var price = parseFloat($row.find('.price').val()) || 0;

            // Calculate total amount
            var totalAmount = quantity * price;

            // Update the total amount in the current row
            $row.find('.totalAmount').val(totalAmount.toFixed(2)); 
            });
        });
    </script> -->
@endsection
