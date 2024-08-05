@extends('partials.header')
    @section('content')
    
    <div class="table-listing-color m-3 p-3">

            <div class="d-flex justify-content-between">
                <h2>Manage Category</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">Product</li>
                        <li class="breadcrumb-item ">Category</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex flex-row-reverse pb-3">
                <button class="btn btn-success" onclick="window.location.href='{{ route('product-category.create') }}'" {{$buttons['Create']}}>+</button>
            </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="category_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $category)
                            <tr>
                                
                                <td>{{$loop->iteration}}</td>
                                <td> {{ $category->category_name }} </td>
                                <td> {{ ($category->cds->toFormattedDateString()) }}</td> 
                                <td> {{ ($category->status == 1) ? "Active":"Inactive" }}</td>
                                <td> 
                                    <a href="{{ route('product-category.edit', $category->id) }}" class="btn btn-warning rounded"><i class="fa-regular fa-pen-to-square text-light"></i></a>
                                    <button class="btn btn-danger rounded remove-btn" title="Remove Data" 
                                        data-id="{{ $category->id }}"
                                        data-status="{{ $category->status }}"
                                        data-url="{{ route('product-category.delete', $category->id) }}" {{$buttons['Remove']}}>
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
    </div>      
    @endsection

@section('script')
    <script>
    $(document).ready( function () {
        $('#category_table').DataTable();
    } );
</script>
@endsection    