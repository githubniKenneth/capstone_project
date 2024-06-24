<style>
    #packageListModal .modal-dialog {
        max-width: 80%;
        max-height: 80vh;
        margin: auto;
    }

    #packageListModal .modal-content {
        height: 80vh; 
        overflow-y: auto; 
    }
</style>

<!-- This was deleted on the first div -> "class="table-listing-color m-3 p-3"" -->
<div>
    <div class="modal fade" id="packageListModal" tabindex="-1" role="dialog" aria-labelledby="packageListLabel" aria-hidden="true" id="modal">
        <div class="modal-dialog modal-dialog-centered modal-custom" role="document">
            <div class="modal-content" id="modal">

                <div class="modal-header">
                    <h5 class="modal-title">Package List</h5>
                    <p id="buttonNamePackage"></p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="packageListBody">
                        
                    <div>
                        <table class="table table-striped" id="modalTable2" style="width: 100%;">
                            <thead >
                                <tr>
                                    <th scope="row"></th>
                                    <th scope="col">Package Name</th>
                                    <th scope="col">Package Price</th>
                                    <th scope="col">Package Description</th>
                                    <th scope="col">Package Remarks</th>
                                </tr>
                            </thead>


                            <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td><input type="checkbox" class="form-check-input rowCheckbox" value="{{$package->id}}"></td>
                                    <td>{{ $package->pack_name }}</td>
                                    <td>{{ $package->pack_price }}</td>
                                    <td>{{ $package->pack_description }}</td>
                                    <td>{{ $package->pack_remarks }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="getPackageDataAndDisplay()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


