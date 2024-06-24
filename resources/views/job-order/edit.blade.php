@extends('partials.header')
@section('content')
    <div class="w-100 p-3">
        <h2>Add New Job Order</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Deployment</li>
                    <li class="breadcrumb-item "><a href="{{ route('job-order.index') }}" class="text-decoration-none">Job Order</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="/deployment/job-order/{{$data->id }}" method="POST" class="d-flex flex-column w-100">
            @method('PUT')
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
                                            <input class="form-control" type="text" name="order_name" value="{{ $data->jo_control_no }}" readonly>
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
                                                <option value="{{$key}}" {{($data->scope_id == $key) ? "selected" :""}}  > {{$value}} </option>
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
                                        <input type="datetime-local" name="jo_date" class="form-control" value="{{ $data->jo_date }}">
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
                                        <input type="datetime-local" name="jo_turnover_date" class="form-control" value="{{ $data->jo_turnover_date }}">
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
                                        <select name="client_id" class="form-select">
                                            <option value="">Select Client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{$client->id}}" {{($data->client_id == $client->id) ? "selected" :"" }}> {{ $client->client_full_name }}</option>
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
                                        <input class="form-control" type="text" name="order_name" id="clientName" value="{{ $data->client->client_full_name }}" readonly>
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
                                        <input class="form-control" type="text" name="order_email" id="clientEmail" value="{{ $data->client->client_email }}" readonly>
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
                                        <input class="form-control" type="text" name="order_contact_no" id="clientContactNo" value="{{ $data->client->client_mobile_no }}" readonly>
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
                                        <input class="form-control" type="text" id="client_address" name="order_address" value="{{ $data->client->client_full_address }}" readonly>
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
                                        <textarea class="form-control" name="jo_landmark" id="" cols="60" rows="1" value="{{ $data->jo_landmark }}">{{ $data->jo_landmark }}</textarea>
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
                                            
                                            @foreach ($order_no as $order_number)
                                                <option value="{{$order_number->id}}" {{($data->order_id == $order_number->id) ? "selected" :"" }}> {{$order_number->order_control_no}} </option>
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
                                        <input type="text" class="form-control" id="prepared_by" value="{{ $order_payment->employee->emp_full_name }}" readonly>
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
                                        
                                        @foreach ($payment_type as $key => $value)
                                            @if ($order_payment->payment_type == $key)
                                                <input type="text" class="form-control" id="payment_type" value="{{ $value }}" readonly>
                                                @break
                                            @endif
                                        @endforeach
                                        
                                        @error('group_name')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Total Amount</label>
                                        <input type="text" class="form-control" id="total_amount" value="{{ $order_payment->order_total_amount }}" readonly>
                                        @error('group_name')
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
                <div class="accordion accordion-flush mb-2" id="accordion-flush-employee">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-employee" aria-expanded="true" aria-controls="flush-employee">
                                Ordered Item Details
                            </button>
                        </h2>
                    <div id="flush-employee" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-employee">
                    <div class="p-3">
                                    <table class="table" id="itemDetailsTable">
                                        <thead>
                                            <tr>
                                                <td class="col-md-1">No</td>
                                                <td class="col-md-4">Item Name</td>
                                                <td class="col-md-1">Unit</td>
                                            <td class="col-md-2">Qty</td>
                                                <td class="col-md-2">Price</td>
                                                <td class="col-md-2">Total Price</td>
                                            </tr>
                                        </thead>
                                        <tbody id="orderedDetails"></tbody>
                                            @foreach ($order_details as $order_detail)
                                                @if ($order_detail->item_id !== 0)
                                                    <tr>
                                                        <td class="col-md-1">{{$loop->iteration}}</td>
                                                        <td class="col-md-4">{{ $order_detail->item->product_name}}</td>
                                                        <td class="col-md-1">{{ $order_detail->item->uom->uom_shortname}}</td>
                                                        <td class="col-md-2">{{ $order_detail->order_qty}}</td>
                                                        <td class="col-md-2">{{ $order_detail->order_amount}}</td>
                                                        <td class="col-md-2">{{ $order_detail->order_total_amount}}</td>
                                                    </tr>
                                                @elseif ($order_detail->item_id == 0)
                                                    
                                                    <tr>
                                                        <td class="col-md-1">{{$loop->iteration}}</td>
                                                        <td class="col-md-4">{{ $order_detail->package->pack_name}}</td>
                                                        <td class="col-md-1">PACKAGE</td>
                                                        <td class="col-md-2">{{ $order_detail->order_qty}}</td>
                                                        <td class="col-md-2">{{ $order_detail->order_amount}}</td>
                                                        <td class="col-md-2">{{ $order_detail->order_total_amount}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>    
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
                                            @foreach ($jo_employees as $jo_employee)
                                                <div class="row my-2" id="emp-row">
                                                    <div class="col-md-5">
                                                        <select name="name[changeId][emp_id]" id="selectEmp-changeId" class="empRow form-select">
                                                            <option value="">Select Employee</option>
                                                            @foreach ($employees as $employee)
                                                                <option value="{{$employee->id}}" {{($jo_employee->emp_id == $employee->id) ? "selected" :"" }}> {{$employee->emp_full_name}} </option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="name[changeId][emp_contact]" class="form-control" id="empContact-changeId" value="{{$jo_employee->employee->emp_phone_no}}" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" name="name[changeId][emp_branch]" id="empBranch-changeId" value="{{$jo_employee->employee->branch->branch_name}}" readonly>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="{{ route('technician.remove', ['deployment_id' => $data->id, 'emp_id' => $jo_employee->emp_id, 'deployment_type' => 2]) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                    <div>
                        <!-- hidden -->
                        <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                        <input type="hidden" value=1 name="created_by">
                        <input type="hidden" value=1 name="updated_by">
                    </div>
                    <div>
                        <a href="{{ route('job-order.index') }}" class="btn btn-secondary rounded">Cancel</a>
                        <button class="btn btn-primary rounded" type="submit">Save Changes</button>
                    </div>
                    
                </div>
                </div>
            </form>
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
            <input type="text" name="name[changeId][emp_contact]" class="form-control" id="empContact-changeId" value="">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" name="name[changeId][emp_branch]" id="empBranch-changeId">
        </div>
        <div class="col-md-1">
            <button class="btn btn-danger" type="button" > <i class="fa-solid fa-trash"></i></button>
        </div>
    </div>
    
@endsection
@section('script')

    <script src="{{asset('js/jobOrder/selectSalesOrder.js')}}"></script>
    <script src="{{asset('js/salesQuotation/clientDetails.js')}}"></script>

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
