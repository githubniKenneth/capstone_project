@extends('website.layout')
@section('content')

@include('website.header')
<div class="w-100 p-3">
    <div class="p-3 d-flex justify-content-center" >
        <form action=" {{ route('website-quotation.store') }} " method="POST" class="d-flex flex-column w-50">
        @csrf
        <div class="accordion accordion-flush mb-2" id="accordion-flush-client">
            <h2 class="accordion-header mb-2" id="flush-headingOne" style="background-color:rgba(211, 206, 206, 0.397); border-radius:10px; padding-left:13px">
                Client Information
            </h2>
            <div id="flush-client" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-client">
                <div class="row d-flex p-3">
                    <!-- QUOTATION NUMBER HERE -->
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
            </div>
        </div>

        <div class="accordion accordion-flush mb-2" id="accordion-flush-client">
            <h2 class="accordion-header mb-2" id="flush-headingOne" style="background-color:rgba(211, 206, 206, 0.397); border-radius:10px; padding-left:13px">
                Requested Quotation
            </h2>
            <div id="flush-client" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-client">
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
        <div class="d-flex justify-content-end mt-2">
            <div>
                <button class="btn btn-primary rounded" type="submit" name="action" value="saveButton">Send Request</button>
            </div>
        </div>

        </form>
    </div>
</div>


@endsection
