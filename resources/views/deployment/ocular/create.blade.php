@extends('partials.header')
@section('content')
    <div class="w-100 p-3">
        <h2>Add New Ocular</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Deployment</li>
                    <li class="breadcrumb-item "><a href="{{ route('ocular.index') }}" class="text-decoration-none">Ocular</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
                <form action="/deployment/ocular/store" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-ocular">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-ocular" aria-expanded="true" aria-controls="flush-ocular">
                                    Ocular Details
                                </button>
                            </h2>
                            <div id="flush-ocular" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-ocular">
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
                                            <input type="datetime-local" name="ocular_date" class="form-control" value="{{ now()->format('Y-m-d H:i:s') }}">
                                            @error('ocular_date')
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
                                            <input class="form-control" type="text" name="order_name" id="clientName" readonly>
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
                                            <input class="form-control" type="text" name="order_email" id="clientEmail" readonly>
                                            @error('order_email')
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
                                            <input class="form-control" type="text" name="order_contact_no" id="clientContactNo" readonly>
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
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Status</label>
                                        <select name="ocular_status" id="ocularStatus"  class="form-select">
                                        <option value="">Select Status</option>
                                            @foreach ($ocular_status as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Landmark</label>
                                            <textarea class="form-control" name="jo_landmark" id="" cols="60" rows="1"></textarea>
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
                                    Technician Details
                                </button>
                            </h2>                            <div id="flush-employee" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-employee">
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
                        <!-- <div>
                            
                            <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by">
                        </div> -->
                        <div>
                            <a href="{{ route('ocular.index') }}" class="btn btn-secondary rounded">Cancel</a>
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
@endsection
@section('script')
<script>
    $(document).ready(function(){ // add employee row
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

<script src="{{asset('js/salesQuotation/clientDetails.js')}}"></script>
<script>
    $(document).ready(function(){ // get employee details
        $('body').on('change', '#selectClient', function (e){
            var _self = $(this);
            $.ajax({
                type: "GET",
                url: _baseUrl + 'deployment/ocular/find-client/' + _self.val(),
                success: function(response) {
                    // console.log(response.data);
                    $('#client_address').val(response.data.client_full_address);
                },
                async: false
            });
            
        });
    });
</script>


        @if (Session::has('message'))
        <script>
            swal({
                title: "Success!",
                text: "{{ Session::get('message') }}",
                icon: 'success',
                timer: 2000,
                buttons: false
            }).then(function() {
                window.location.href = "{{ route('ocular.index') }}";
            })
        </script>
        @endif
    
@endsection
