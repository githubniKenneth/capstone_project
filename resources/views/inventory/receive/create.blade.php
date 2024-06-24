@extends('partials.header')



@section('content')
@include('product.item.item-list-modal')
    <div class="w-100 p-3">
        <h2>Add New Receives</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Inventory</li>
                    <li class="breadcrumb-item "><a href="{{ route('receive.index') }}" class="text-decoration-none">Receives</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add Receives</li>
            </ol>
        </nav>
        <div class="p-3 d-flex justify-content-center">
            <form action="{{ route('inventory-receive.store') }}" method="POST" class="d-flex flex-column w-100">
            @csrf
                <div class="accordion accordion-flush mb-2" id="accordion-flush-item">
                    <div class="accordion-item border">
                        <h2 class="accordion-header mb-2" id="flush-headingOne">
                            <button class="accordion-button collapsed p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-item" aria-expanded="true" aria-controls="flush-item">
                                Receiving Information 
                            </button>
                        </h2>
                        <div id="flush-item" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-item">
                            <div class="row d-flex p-3">
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Control Number</label>
                                        <input class="form-control" type="text" name="rec_code">
                                        @error('rec_code')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Supplier</label>
                                        <input class="form-control" type="text" name="rec_supplier">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Date</label>
                                        <input type="date" name="rec_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex flex-column">
                                        <label for="" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="rec_remarks" id="" cols="30" rows="2"></textarea>
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
                                <div class="d-flex justify-content-end pb-4" >
                                    <a href="{{ route('product-packages.item-list') }}" data-toggle="modal" id="itemList" data-target="#itemListModal" title="Remove Data"
                                        class="btn btn-success rounded">
                                            Show Item List
                                    </a>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td class="col-md-5">Item Name</td>
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
                            <a href="{{ route('receive.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="submitButton">Submit</button>
                            <button class="btn btn-primary rounded" type="submit" name="action" value="saveButton">Save Changes</button>
                        </div>
                    </div>
                </div>

                
                
            </form>
        </div>
    </div>



    <script src="{{asset('js/product-item/itemListModal.js')}}"></script>

    <script src="{{asset('js/inv-receiving/getSelectedItems.js')}}"></script>

    <script>

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
                window.location.href = "{{ route('receive.index') }}";
            })
        </script>
        @endif
@endsection

@section('script')
    
@endsection
