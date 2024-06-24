<form action="{{ $action }}" method="POST">
    <div class="modal-body">
        @csrf
        @method('PUT')
        <h5 class="text-center">Are you sure you want to Active/Inactive?</h5>
    </div>
    <div class="d-flex justify-content-center ">
        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Yes</button>
    </div>
</form>