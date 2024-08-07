@extends('partials.header')
    @section('content')
    
    <div class="table-listing-color m-3 p-3">

        <h2>Manage Packages</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item ">Product</li>
                    <li class="breadcrumb-item ">Packages</li>
                </ol>
            </nav>
            
        <div class="d-flex flex-row-reverse pb-3">
            <button class="btn btn-success" onclick="window.location.href='{{ route('product-packages.create') }}'" {{$buttons['Create']}}>+</button>
        </div>

            <div class="table-responsive">
                <table class="table table-striped" id="packages_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pack Name</th>
                            <th scope="col">Pack Price</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Resolution</th>
                            <th scope="col">Camera Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($data as $packages)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $packages->pack_name }}</td>
                            <td>{{ $packages->pack_price }}</td>
                            <td>{{optional($packages->brand)->brand_name}}</td>
                            <td>{{optional($packages->resolution)->resolution_desc}}</td>
                            <td>{{ $packages->camera_number }}</td>
                            <td> 
                                <button class="btn {{$packages->status_color}}">
                                {{ ($packages->status == 1) ? "Active":"Inactive" }}
                                </button>
                            </td>

                            <td> 
                                <a href="{{ route('product-packages.edit', $packages->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                    data-id="{{ $packages->id }}"
                                    data-status="{{ $packages->status }}"
                                    data-url="{{ route('product-packages.delete', $packages->id) }}" {{$buttons['Remove']}}>
                                    <i class="fas fa-trash text-light fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- remove modal -->
        <x-remove-modal/>
        <script src="{{asset('js/remove-modal/open-modal.js')}}"></script>
        <!-- remove modal -->
    @endsection

    @section('script')
    <script>
        $(document).ready( function () {
            $('#packages_table').DataTable();
        } );
    </script>
@endsection