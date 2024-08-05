<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Citi Sec</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/admin-style.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('css/form-style.css'); }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.7/datatables.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.7/datatables.min.js"></script>
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        var _baseUrl = "{{ url('/') }}/";  
    </script>
</head>
<body>
    <div class="wrapper d-flex h-100 admin-page">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
        @include('partials.sidebar')
        <!-- <p>Sidebar Content</p> -->
        </div>
        <!-- Header -->
        <div class="w-100">
            <div style="height: 70px;" class="d-flex admin-header">
                <div class="w-100 m-3 d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn" data-bs-toggle="collapse" 
                        data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false">
                            <i class="fa-solid fa fa-bars" id="header-bars" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="d-flex flex-row-reverse" >
                        <div class="dropdown open admin-dropdown">
                            <i class="fa-regular fa-bell fa-xl" style="color: white"></i>
                            <a class="btn border-none outline-none text-black dropdown-toggle" type="button" 
                            id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                                <span>{{Auth::user()->employee->emp_full_name}}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="/profile/{{Auth::user()->id;}}">Profile</a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content') <!-- content of modules -->

        </div>
    </div>

            <!-- header.blade.php -->
    </body>
    @yield('script')
</html>