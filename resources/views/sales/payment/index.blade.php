@extends('partials.header')
    @section('content')

    <div class="table-listing-color m-3 p-3">
        
                    <h2>Manage Payments</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item ">Sales</li>
                            <li class="breadcrumb-item ">Payments</li>
                        </ol>
                    </nav>
                    
                <div class="d-flex flex-row-reverse pb-3">
                    <a href="{{ route('sales-quotation.create') }}"class="btn btn-success">+</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped" id="quotation_table">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">_______</th>
                                <th scope="col">_______</th>
                                <th scope="col">_______</th>
                                <th scope="col">_______</th>
                                <th scope="col">_______</th>
                                <th scope="col">_______</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <!-- <tbody>

                            for each data as ____
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            endforeach

                        </tbody>-->
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
        $('#quotation_table').DataTable();
    } );
</script>
@endsection