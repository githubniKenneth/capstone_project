@extends('partials.header')



@section('content')
@include('sales.quotation.package-list-modal')
@include('product.item.item-list-modal')
    <div class="w-100 p-3">
        <h2>Add New Return</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Inventory</li>
                    <li class="breadcrumb-item "><a href="{{ route('return.index') }}" class="text-decoration-none">Return</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Return</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="{{ route('return.store') }}" method="POST" class="d-flex flex-column w-100" id ="return-form">
            @csrf
                <div class="accordion accordion-flush mb-2" id="accordion-flush-item">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item" aria-expanded="true" aria-controls="flush-item">
                                Return Information 
                            </button>
                        </h2>
                        <div id="flush-item" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item">
                            <div class="row d-flex p-3">
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Return Number</label>
                                        <input class="form-control" type="text" name="return_control_no" readonly>
                                        @error('return_control_no')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Date</label>
                                        <input type="date" name="return_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                                        @error('return_date')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Employee</label>
                                        <select name="returned_by" id="selectEmp" class="form-control">
                                            <option value="">Select Employee</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->emp_full_name}}</option>
                                            @endforeach
                                            @error('returned_by')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Branch</label>
                                        <select name="branch_id" id="" class="form-control">
                                            <option value="">Select Branch</option>
                                            @foreach ($branches as $branch)
                                                <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('branch_id')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="" cols="30" rows="2"></textarea>
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
                                    <a href="{{ route('product.item-list') }}" data-toggle="modal" id="itemList" data-button-name="selectIssuances" data-target="#itemListModal" title="Show Items"
                                        class="btn btn-success rounded" style="margin-left: 30px;">
                                            Show Item List
                                    </a>
                                </div>
                                <table class="table" id="itemDetailsTable">
                                    <thead>
                                    <tr>
                                        <td class="col-md-1">No.</td>
                                        <td class="col-md-6">Item Name</td>
                                        <td class="col-md-2">Unit</td>
                                        <td class="col-md-2">Qty</td>
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
                            <a href="{{ route('return.index') }}" class="btn btn-secondary rounded">Cancel</a>
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
                window.location.href =  "{{ route('return.index') }}";
            })
        </script>
    @endif

@endsection

@section('script')
    <script>
        $(document).ready(function() {
        $('#return-form').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('return.index') }}";
                            }
                        });
                    } else if(response.error_type == "no balance")
                    {
                        Swal.fire({
                            title: response.message,
                            html: `
                                    Item: ${response.item_name}<br>
                                    Balance: ${response.item_qty}
                                `,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    else if(response.error_type == "invalid quantity")
                    {
                        Swal.fire({
                            title: response.message,
                            html: `
                                    Quantity: ${response.item_qty}
                                `,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                    else if (response.error_type =="no items")
                    {
                        Swal.fire({
                            title: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
    </script>

    <script src="{{asset('js/product-item/itemListModal.js')}}"></script>
    <script src="{{asset('js/product-item/packageListModal.js')}}"></script>
    <script src="{{asset('js/inv-receiving/removeItem.js')}}"></script>
    <script src="{{asset('js/salesOrder/getSelectedItems.js')}}"></script>
@endsection
