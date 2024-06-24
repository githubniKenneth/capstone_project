@include('partials.header')
@include('partials.sidebar')
        <div class="w-100 p-3">
            <h2>Add New User Role</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">User Account</li>
                        <li class="breadcrumb-item "><a href="{{ route('user-role.index') }}" class="text-decoration-none">User Role</a></li>
                        <li class="breadcrumb-item" aria-current="page">Add User Role</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="/add-employee-role" method="POST" class="d-flex flex-column w-100">
                    @csrf
                    <div class="accordion accordion-flush mb-2" id="accordion-flush-address">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-headingOne">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-address" aria-expanded="true" aria-controls="flush-address">
                                    
                                </button>
                            </h2>
                            <div id="flush-address" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-flush-address">
                                <div class="row d-flex p-3">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Employee</label>
                                            <input class="form-control" type="text" name="empr_role" >
                                            @error('empr_role')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex flex-column">
                                            <label for="" class="form-label">Account Role</label>
                                            <input class="form-control" type="text" name="empr_desc">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <!-- hidden -->
                            <!-- <input type="hidden" value=1 name="branch_status">
                            <input type="hidden" value=1 name="created_by">
                            <input type="hidden" value=1 name="updated_by"> -->
                        </div>
                        <div>
                            <a href="{{ route('employee-role') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit">Save Changes</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
@include('partials.footer')