@extends('website.layout')
@section('content')

@include('website.header')
<div class="w-100 p-3">
    <div class="p-3 d-flex justify-content-center" >
        <form action=" {{ route('website-quotation.store') }} " method="POST" class="d-flex flex-column border w-50 p-4">
        @csrf
        <div class="accordion accordion-flush mb-2" id="accordion-flush-client">
            <div class="accordion-order border">
                <h2 class="accordion-header mb-2" id="flush-headingOne">
                    <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-client" aria-expanded="true" aria-controls="flush-order">
                        Client Information
                    </button>
                </h2>
                <div id="flush-client" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-client">
                    <div class="row d-flex p-3">
                        <div class="col-md-6 d-none">
                            <div class="form-group d-flex flex-column">
                                <label for="" class="form-label">Date</label>
                                <input type="date" name="quote_date" class="form-control d-none" value="{{ now()->format('Y-m-d') }}">
                                @error('quote_date')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label for="" class="form-label">Full Name </label>
                                <input class="form-control" id="clientName" type="text" name="quote_name">
                                @error('quote_name')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label for="" class="form-label"> Email </label>
                                <input name="quote_email" id="clientEmail" class="form-control" type="text">
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
                                <label for="" class="form-label">Contact Number </label>
                                <input name="quote_contact_no" type="text" id="clientContactNo" class="form-control">
                                @error('quote_contact_no')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label for="" class="form-label">Address </label>
                                <input name="quote_address" type="text" id="client_address" class="form-control">
                                @error('quote_address')
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
                                <label for="" class="form-label">Nearest Branch</label>
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
                    </div>
                </div>
            </div>
        </div>
        
        <div class="accordion accordion-flush mb-2" id="accordion-flush-quotation">
            <div class="accordion-order border">
                <h2 class="accordion-header mb-2" id="flush-headingOne">
                    <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-quotation" aria-expanded="true" aria-controls="flush-order">
                        Requested Quotation
                    </button>
                </h2>
                <div id="flush-quotation" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-quotation">
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
                                <select name="resolution_desc" id="" class="form-control">
                                    <option value="">Select Resolution</option>
                                    @foreach ($resolutions as $resolution)
                                        <option value="{{$resolution->id}}">{{$resolution->resolution_desc}}</option>
                                    @endforeach
                                </select>
                                @error('resolution_desc')
                                    <p class="text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group d-flex flex-column">
                                <label for="" class="form-label">Number of Channels </label>
                                <input class="form-control" id="" type="number" name="channel_id">
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
                                <input class="form-control" id="" type="number" name="indoor_cam_no">
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
                                <input class="form-control" id="" type="number" name="outdoor_cam_no">
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
        <div class="d-flex justify-content-end mt-2">
            <div>
                <button class="btn rounded" id="quote-btn" type="submit" name="action" value="saveButton">Send Request</button>
            </div>
        </div>

        </form>
    </div>
</div>


@endsection
