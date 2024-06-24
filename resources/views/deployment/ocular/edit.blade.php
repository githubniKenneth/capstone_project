@extends('partials.header')
@section('content')
    <div class="w-100 p-3">
        <h2>Edit Ocular</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Deployment</li>
                    <li class="breadcrumb-item "><a href="{{ route('ocular.index') }}" class="text-decoration-none">Ocular</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
                <form action="/deployment/ocular/update/{{$data->id}}" method="POST" class="d-flex flex-column w-100">
                @method('PUT')
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
                                                    <option value="{{$client->id}}" {{($data->client_id == $client->id) ? "selected" :""}} >{{($client->client_full_name) ? $client->client_full_name : $client->client_business_name }}</option>
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
                                            <input type="date" name="ocular_date" class="form-control" value="{{ $data->ocular_date }}">
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
                                            <input class="form-control" type="text" name="order_name" id="clientName" value="{{ ($client_data->client_full_name) ? $client_data->client_full_name : $client_data->client_business_name }}" readonly>
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
                                            <input class="form-control" type="text" name="order_email" id="clientEmail" value="{{ $client_data->client_email }}" readonly>
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
                                            <input class="form-control" type="text" name="order_contact_no" id="clientContactNo" value="{{ $client_data->client_mobile_no }}" readonly>
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
                                            <input class="form-control" type="text" id="client_address" name="order_address" value="{{ $client_data->client_full_address }}" readonly>
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
                                                <option value="{{$key}}" {{ ($data->ocular_status == $key ? 'selected' : '') }}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Landmark</label>
                                            <textarea class="form-control" name="jo_landmark" id="" cols="60" rows="1" >{{ $data->ocular_landmark }}</textarea>
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
                                            <?php $rowCount = 1?>
                                            @foreach ($jo_employees as $jo_employee)
                                                <div class="row my-2" id="tech-{{$rowCount}}">
                                                    <div class="col-md-5">
                                                        <select name="name[{{$rowCount}}][emp_id]" id="selectEmp-{{$rowCount}}" class="empRow form-select">
                                                            <option value="">Select Employee</option>
                                                            @foreach ($employees as $employee)
                                                                <option value="{{$employee->id}}" {{($jo_employee->emp_id == $employee->id) ? "selected" :"" }}> {{$employee->emp_full_name}} </option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="name[{{$rowCount}}][emp_contact]" class="form-control" id="empContact-{{$rowCount}}" value="{{$jo_employee->employee->emp_phone_no}}" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" name="name[{{$rowCount}}][emp_branch]" id="empBranch-{{$rowCount}}" value="{{$jo_employee->employee->branch->branch_name}}" readonly>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-danger removeTechnician" type="button" id="{{$rowCount}}"> <i class="fa-solid fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            <?php $rowCount++?>
                                            @endforeach
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
            <button class="btn btn-danger removeTechnician" type="button" id="changeId"> <i class="fa-solid fa-trash"></i></button>
        </div>
    </div>
@endsection
@section('script')

<script src="{{asset('js/jobOrder/add-tech.js')}}"></script>
<script src="{{asset('js/salesQuotation/clientDetails.js')}}"></script>
@endsection
