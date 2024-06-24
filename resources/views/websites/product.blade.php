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

            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home">
                        <h3 class="heading-logo"> <span>CITI Security & Technology</span></h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown" >
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
            <div class="container-fluid page-header  mb-5" style="background-color: rgb(255, 42, 42);">
                <div class="container ">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Product</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white" href="home">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="service.html">About</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div> 
    <!-- Page Header End -->


    <section>
        <div class="container-fluid">
                <h1 class="heading" style="background-color:rgba(211, 206, 206, 0.397); padding: 50px;border-radius: 10px;">Our latest Product</h1>
                <hr>
            <div id="content">
                <div class="d-sm-flex ">
                    <div class="col-md-3">
                        <div class="border-bottom h5 text-uppercase">Filter By</div>

                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">BRANDS
                                <button
                                    class="btn ms-auto" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#BRANDS" aria-expanded="false" aria-controls="BRANDS">
                                </button> 
                            </div>
                            <div id="BRANDS" class="collapse show">

                                <div class="my-1">
                                    <label class="tick"> HIKVISION <input type="radio" name="brand" value="HIKVISION">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> DAHUA <input type="radio" name="brand" value="DAHUA">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> ROVER <input type="radio" name="brand" value="ROVER">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> TPLINK <input type="radio" name="brand" value="TPLINK">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> ASUS <input type="radio" name="brand" value="ASUS">
                                        <span class="check"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">CATEGORIES 
                                <button
                                    class="btn ms-auto" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#CATEGORIES" aria-expanded="false" aria-controls="CATEGORIES">
                                </button> 
                            </div>
                            <div id="CATEGORIES" class="collapse show">

                                <div class="my-1">
                                    <label class="tick"> Turbo HD Products <input type="checkbox" name="category" value="Turbo HD Products"> 
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> DIY Packages <input type="checkbox" name="category" value="DIY Packages">
                                    <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick">Network Products <input type="checkbox" name="category" value="Network Products">
                                    <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick">Display and Control<input type="checkbox" name="category" value="Display and Control">
                                    <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick">Transmission <input type="checkbox" name="category" value="Transmission">
                                    <span class="check"></span>
                                    </label>
                                </div>
                                
                                <div class="my-1">
                                    <label class="tick">Video Intercom <input type="checkbox" name="category" value="Video Intercom">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Intelligent Traffic Products <input type="checkbox" name="category" value="Intelligent Traffic Products">
                                        <span class="check"></span>

                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Access Control <input type="checkbox" name="category" value="Access Control">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Thermal Products <input type="checkbox" name="category" value="Thermal Products">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Alarm <input type="checkbox" name="category" value="Alarm">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Onboard Security <input type="checkbox" name="category" value="Onboard Security">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Accessories <input type="checkbox" name="category" value="Accessories">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Software <input type="checkbox" name="category" value="Software">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> HiLook <input type="checkbox" name="category" value="HiLook">
                                        <span class="check"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">SERIES 
                                <button
                                    class="btn ms-auto" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#SERIES" aria-expanded="false" aria-controls="SERIES">
                                </button> 
                            </div>
                            <div id="SERIES" class="collapse show">

                                <div class="my-1">
                                    <label class="tick"> Value Series <input type="checkbox" name="series" value="Value Series">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Turbo Series <input type="checkbox" name="series" value="Turbo Series">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Webcam Series <input type="checkbox" name="series" value="Webcam Series">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Pro Series <input type="checkbox" name="series" value="Pro Series">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> IOT Series <input type="checkbox" name="series" value="IOT Series">
                                        <span class="check"></span>
                                    </label>
                                </div>

                                <div class="my-1">
                                    <label class="tick"> Ultra Series <input type="checkbox" name="series" value="Ultra Series">
                                        <span class="check"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-10 mb-5">
                        <div class="row">
                            <div class="col-md-12 "> <!-- text-center -->
                                <div class="row justify-content-center">
                                    @foreach ($data as $item)
                                        <!-- status == 1 && $item checks if the item is active or not (It will not be displayed if inactive) -->
                                        @if ($item->status == 1 && $item->file_path)
                                        <div class="col-md-4 mb-3 product-card" 
                                        data-brand="{{ $item->brand->brand_name }}" 
                                        data-category="{{ $item->category->category_name }}" 
                                        data-series="{{ $item->series->series_name }}">

                                                <div class="card" style="width: 430px;">

                                                    <div class="d-flex justify-content-center" style="background-color:rgba(211, 206, 206, 0.397); padding:30px">
                                                        <img src="{{ asset('storage/uploads/itemImages/' . basename($item->file_path)) }}"
                                                        alt="Product Image" class="card-img-top" style="max-width: 200px; height: 200px;">
                                                    </div>

                                                    <div class="card-body">
                                                        <h2 class="card-title">{{ $item->product_name }}</h2>

                                                        <div class="d-flex">  <!--justify-content-center-->
                                                            <p>{{ $item->product_price }}</p>
                                                        </div>
                                                        <h6>Category:</h6>
                                                        <p>{{optional($item->category)->category_name}}</p>

                                                        <h6>Resolution:</h6>
                                                        <p>{{ ($item->resolution)->resolution_desc}}</p>

                                                        <h6>Series:</h6>
                                                        <p>{{ ($item->series)->series_name}}</p>
                                                        
                                                        <h6>Brand:</h6>
                                                        <p>{{ ($item->brand)->brand_name }}</p>

                                                        <h6>Description:</h6>
                                                        <p>{{ $item->product_desc }}</p>

                                                        <a href="#"><button type="button" class="btn btn-danger">view</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- Indicates if pagination is applied -->
                                <div class="col-md-4">
                                    @if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        {{ $data->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



<!-- footer section starts  -->

<footer class="bg-dark py-5 mt-5">
    <div class="container text-light text-center">
        <p class="display-5 mb-3"> CITI Security & Technology </p>
    </div>
</footer>

<!-- footer section ends -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous">
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const radioButtons = document.querySelectorAll('input[type="radio"]');


        function filterProducts() {
            const selectedBrands = Array.from(document.querySelectorAll('input[name="brand"]:checked')).map(cb => cb.value);
            const selectedCategories = Array.from(document.querySelectorAll('input[name="category"]:checked')).map(cb => cb.value);
            const selectedSeries = Array.from(document.querySelectorAll('input[name="series"]:checked')).map(cb => cb.value);

            const products = document.querySelectorAll('.product-card');
            products.forEach(product => {
                const brand = product.getAttribute('data-brand');
                const category = product.getAttribute('data-category');
                const series = product.getAttribute('data-series');

                if (
                    (selectedBrands.length === 0 || selectedBrands.includes(brand)) &&
                    (selectedCategories.length === 0 || selectedCategories.includes(category)) &&
                    (selectedSeries.length === 0 || selectedSeries.includes(series))
                ) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', filterProducts);
        });
        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', filterProducts);
        });

        filterProducts(); // Initially filter products on page load
    });
</script>


</body>

</html>
