
@extends('partials.header')
    @section('content')
        <div class="w-100 p-3">
        <h2>Add New User Role</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">User Account</li>
                        <li class="breadcrumb-item "><a href="{{ route('user-role.index') }}" class="text-decoration-none">User Role</a></li>
                        <li class="breadcrumb-item" aria-current="page">Add</li>
                </ol>
            </nav>
            <div class="p-3 d-flex justify-content-center">
                <form action="{{ route('user-role.update', $data->id) }}" method="POST" class="d-flex flex-column w-100">
                    @method('PUT')
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
                                            <label for="" class="form-label">Account Role</label>
                                            <input class="form-control" type="text" name="user_role" value="{{ $data->user_role }}">
                                            @error('user_role')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion accordion-flush" id="accordion-flush-access-control">
                        <div class="accordion-item border">
                            <h2 class="accordion-header mb-2" id="flush-heading">
                                <button class="accordion-button collapsed p-0 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-access-control" aria-expanded="true" aria-controls="flush-access-control">
                                    Dashboard Access
                                </button>
                            </h2>
                            <div id="flush-access-control" class="accordion-collapse collapse show m-2" aria-labelledby="flush-access-control" data-bs-parent="#accordion-flush-access-control">
                                <div class="row">
                                    @foreach ($dashboard as $key => $value)
                                            <div class="col-sm-4">
                                                <input class="form-check-input " type="checkbox" name="dashboard[{{$loop->iteration}}][dashboard_id]" value="{{$key}}" {{ in_array($key, $current_access) ? 'checked' : '' }}>
                                                <label class="form-check-label" style="font-size: 15px;">{{ $value }}</label>
                                            </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-2">
                        <div>
                            <a href="{{ route('user-role.index') }}" class="btn btn-secondary rounded">Cancel</a>
                            <button class="btn btn-primary rounded" type="submit" {{$buttons['Update']}}>Save Changes</button>
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
                window.location.href = "{{ route('user-role.index') }}";
            })
        </script>
    @endif



    @endsection
