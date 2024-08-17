<style>
    #itemListModal .modal-dialog {
        max-width: 80%;
        max-height: 80vh;
        margin: auto;
    }

    #itemListModal .modal-content {
        height: 80vh; 
        overflow-y: auto; 
    }
</style>

<!-- This was deleted on the first div -> "class="table-listing-color m-3 p-3"" -->
<div>
    <div class="modal fade" id="itemListModal" tabindex="-1" role="dialog" aria-labelledby="itemListLabel" aria-hidden="true" id="modal">
        <div class="modal-dialog modal-dialog-centered modal-custom" role="document">
            <div class="modal-content" id="modal">

                <div class="modal-header">
                    <h5 class="modal-title">Item List</h5>
                    <p id="buttonName" class="d-none"></p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="itemListBody">
                    <div>
                        <table class="table" id="modalTable" style="width: 100%;">
                            <thead> 
                                <tr>
                                    <th scope="row"></th>
                                    <th>Item Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Series</th>
                                    <th>Resolution</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Balance</th>
                                    <!-- <th>Image</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $data)
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input rowCheckbox" value="{{$data->id}}"></td>
                                        <td>{{$data->product_name}}</td>
                                        <td>{{$data->brand->brand_name}}</td>
                                        <td>{{optional($data->category)->category_name}}</td>
                                        <td>{{optional($data->series)->series_name}}</td>
                                        <td>{{optional($data->resolution)->resolution_desc}}</td>
                                        <td>{{optional($data->uom)->uom_name}}</td>
                                        <td> {{ number_format($data->product_price, 2, '.', ',') }}</td>
                                        <td>{{optional($data->uom)->uom_name}}</td>
                                        <!-- <td>{{optional($data->image)->file_path}}</td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="getDataAndDisplay()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


