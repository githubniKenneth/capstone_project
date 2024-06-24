<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CITI Security & Technology</title>

    <!-- Favicon -->
    <link href="{{URL('assets/images/fav.jpeg')}}" rel="icon">

    <link rel="stylesheet" href="{{ URL::asset('css/website-style.css'); }}">
    <link rel="stylesheet" href="media.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>

<body>

    <!-- Now Start -->

    <div class="header">
        <div class="nav_bar-top">
            <div class="container-fluid">
                <div class="text-container">
                    <div class="text-content">

                        <p class="para-text"><span class="span_text"><i
                                    class="bi bi-envelope-fill"></i>citisec2020@gmail.com</span></p>
                        <p class="para-text"><span class="span_text"><i
                                    class="bi bi-phone-fill"></i>+639560896852</span></p>

                    </div>

                    <div class="social-links">
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-instagram"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- nav-bar top finished -->

            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home">
                        <h3 class="heading-logo"> <span>CITI Security & Technology</span></h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact">Contact</a>
                            </li>

                            <li>
                                <hr class="divider">
                            </li>


                        </ul>
                    </div>


                </div>
            </nav>
            
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5" style="background-color: rgb(255, 42, 42);">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="home">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="product.html">Product</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- contact section starts  -->

    <section id="Contact" class="contact">
        <h1 class="heading">Direct Contact To Our Near Branch</h1>
            <div class="box-container mx-auto">
            @foreach ($data as $branch)

                <div class="box">
                    <h2> {{ $branch->branch_name }} </h2>
                    <hr>      
                    <p> {{ $branch->full_address }} </p>
                    <p> {{ $branch->branch_tele_no }} </p>
                    <p> {{ $branch->branch_phone_no }} </p>
                    <p> {{ $branch->branch_email }} </p>
                <!-- <a href="https://m.me/cybher.angustia" class="bi bi-messenger"></a> -->
                <!-- <a href="https://www.facebook.com/cybher.angustia?mibextid=ZbWKwL" class="bi bi-facebook"></a> -->
                </div>
                @endforeach
            </div>
    </section>


  
  <!-- contact section ends -->

<!-- footer section starts  -->

<footer class="bg-dark py-5 mt-5">
    <div class="container text-light text-center">
        <p class="display-5 mb-3"> CITI Security & Technology </p>
    </div>
</footer>

<!-- footer section ends -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>