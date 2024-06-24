@extends('partials.header')
@section('content')
@include('sales.quotation.item-list-modal')
@include('sales.quotation.package-list-modal')
    <div class="w-100 p-3">
        <h2>Add New Job Order</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Deployment</li>
                    <li class="breadcrumb-item "><a href="{{ route('job-order.index') }}" class="text-decoration-none">Job Order</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
                <form action="/deployment/job-order/store" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-job-order">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-job-order" aria-expanded="true" aria-controls="flush-job-order">
                                    Job Order Details
                                </button>
                            </h2>
                            <div id="flush-job-order" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-job-order">
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Job Order Number</label>
                                            <input class="form-control" type="text" name="order_name" readonly>
                                            @error('group_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Job Order Type</label>
                                            <select name="scope_id" id=""  class="form-select">
                                                <option value="">Select Type</option>
                                                
                                                @foreach ($scope_of_works as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @error('group_name')
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
                                            <label for="" class="form-label">Date</label>
                                            <input type="datetime-local" name="jo_date" class="form-control" value="{{ now()->format('Y-m-d H:i:s') }}">
                                            @error('group_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Turn Over Date</label>
                                            <input type="datetime-local" name="jo_turnover_date" class="form-control">
                                            @error('group_name')
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
                                            <label for="" class="form-label">Client</label>
                                            <select name="client_id" id="selectClient"  class="form-select">
                                                <option value="">Select Client</option>
                                                
                                                @foreach ($clients as $client)
                                                    <option value="{{$client->id}}">{{($client->client_full_name) ? $client->client_full_name : $client->client_business_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('group_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Full Name</label>
                                            <input class="form-control" type="text" name="order_name" id="clientName" readonly>
                                            @error('order_name')
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
                                            <label for="" class="form-label">Email</label>
                                            <input class="form-control" type="text" name="order_email" id="clientEmail" readonly>
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
                                            <input class="form-control" type="text" name="order_contact_no" id="clientContactNo" readonly>
                                            @error('order_contact_no')
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
                                            <label for="" class="form-label">Address</label>
                                            <input class="form-control" type="text" id="client_address" name="order_address" readonly>
                                            @error('order_address')
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
                                            <label for="" class="form-label">Landmark</label>
                                            <textarea class="form-control" name="jo_landmark" id="" cols="60" rows="1"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-order">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-order" aria-expanded="true" aria-controls="flush-order">
                                    Order Details
                                </button>
                            </h2>
                            <div id="flush-order" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-order">
                                <div class="row d-flex p-3">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Order No.</label>
                                            <select name="order_id" id="selectOrder"  class="form-select">
                                                <option value="">Select Order</option>
                                                
                                                @foreach ($order_no as $order)
                                                    <option value="{{$order->id}}">{{$order->order_control_no}}</option>
                                                @endforeach
                                            </select>
                                            @error('group_name')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Prepared By</label>
                                            <input type="text" class="form-control" id="prepared_by" readonly>
                                            @error('group_name')
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
                                            <label for="" class="form-label">Payment Type</label>
                                            <input type="text" class="form-control" id="payment_type" value="" readonly>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Total Amount</label>
                                            <input type="text" class="form-control" id="total_amount" value="" readonly>
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
                                    Ordered Item Details
                                </button>
                            </h2>
                        </div>
                        <div id="flush-employee" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-employee">
                            <div class="p-3">
                                <table class="table" id="itemDetailsTable">
                                    <thead>
                                    <tr>
                                        <td class="col-md-1">No</td>
                                        <td class="col-md-4">Item Name</td>
                                        <td class="col-md-1">Unit</td>
                                        <td class="col-md-2">Qty</td>
                                        <td class="col-md-2">Unit Cost</td>
                                        <td class="col-md-3">Total Cost</td>
                                    </tr>
                                    </thead>
                                    <tbody id="orderedDetails">
                                        
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                        
                    </div>
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-employee">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-employee" aria-expanded="true" aria-controls="flush-employee">
                                    Technician Details
                                </button>
                            </h2>
                            <div id="flush-employee" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-employee">
                                <div class="p-3">
                                    <div class="d-flex justify-content-end addEmployee" >
                                        <!-- <a href="#" class="btn btn-success add-row">+</a> -->
                                        <button class="btn btn-success add-row" type="button">+</button>
                                        <!-- <button onclick="myFunction()" class="btn btn-success addEmployeeRow">+</button> -->
                                    </div>

                                    <div id="emp-table" class="row">
                                        <div>
                                            <div class="row my-2">
                                                <div class="col-md-5">
                                                    Name
                                                </div>
                                                <div class="col-md-3">
                                                    Contact No.
                                                </div>
                                                <div class="col-md-3">
                                                    Branch
                                                </div>
                                            </div>
                                        </div>

                                        <div class="technician-info" >
                                            
                                        </div>
                                        
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('job-order.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit">Save Changes</button>
                        </div>
                        
                    </div>
                </form>
            </div>
    </div> 
    <div class="row my-2 d-none" id="emp-row">
        <div class="col-md-5">
            <select name="name[changeId][emp_id]" id="selectEmp-changeId" class="empRow form-select">
                <option value="">Select Employee</option>
                @foreach ($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->emp_full_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="name[changeId][emp_contact]" class="form-control" id="empContact-changeId" value="" readonly>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" name="name[changeId][emp_branch]" id="empBranch-changeId" readonly>
        </div>
        <div class="col-md-1">
            <button class="btn btn-danger" type="button" > <i class="fa-solid fa-trash"></i></button>
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
                window.location.href =  "{{ route('job-order.index') }}";
            })
        </script>
        @endif

@endsection
@section('script')

    <script src="{{asset('js/product-item/itemListModal.js')}}"></script>
    <script src="{{asset('js/jobOrder/selectSalesOrder.js')}}"></script>
    <script src="{{asset('js/salesQuotation/clientDetails.js')}}"></script>
    <script src="{{asset('js/salesOrder/getSelectedItems.js')}}"></script>

    <script>
        // <script type="text/javascript" src="{{ asset('/js/jobOrder/job-order.js') }}">
        $(document).ready(function(){
            $('body').on('click', '.add-row', function (e){
                var trCount = $('.empRow').length;
                var html = $('#emp-row').html(); // cino-clone
                html = html.replace(/changeId/g, trCount);
                $('#emp-table').find('.technician-info').append('<div class="row my-2">'+html+'</div>');
            });

            
        });
        
        $(document).ready(function(){ // get employee details
            $('body').on('change', '.empRow', function (e){
                var _self = $(this);
                var _row  = _self.closest('.row');

                $.ajax({
                    type: "GET",
                    url: _baseUrl + 'deployment/job-order/find-employee/' + _self.val(),
                    success: function(response) {
                        // console.log(response.data);
                        _row.find('div:nth-child(2) input').val(response.data.emp_phone_no);
                        _row.find('div:nth-child(3) input').val(response.data.branch.branch_name);
                    },
                    async: false
                });
                
            });
        });
    </script>

<script>
    

</script>
@endsection
