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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Packages</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white" href="home">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="service.html">About</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Packages</li>
                        </ol>
                    </nav>
                </div>
            </div> 
    <!-- Page Header End -->


<section>
  <div class="container-fluid">
          <h1 class="heading" style="background-color:rgba(211, 206, 206, 0.397); padding: 50px;border-radius: 10px;">Packages</h1>
          <hr>
      <div id="content">
          <div class="d-sm-flex ">
            <div class="col-md-3">
                <div class="border-bottom h5 text-uppercase">Filter By</div>

                <!-- Brands -->
                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">BRANDS
                        <button
                            class="btn ms-auto" type="button" data-bs-toggle="collapse"
                            data-bs-target="#BRANDS" aria-expanded="false" aria-controls="BRANDS">
                        </button> 
                    </div>
                    <div id="BRANDS" class="collapse show">
                    <input type="checkbox" name="brand" value="1"> Brand 1

                        <div class="my-1">
                            <label class="tick"> ASUS <input type="radio" name="brand" value="ASUS">
                                <span class="check"></span>
                            </label>
                        </div>

                        <div class="my-1">
                            <label class="tick"> HIKVISION <input type="radio" name="brand" value="HIKVISION">
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
                            <label class="tick"> DAHUA <input type="radio" name="brand" value="DAHUA">
                                <span class="check"></span>
                            </label>
                        </div>

                    </div>
                </div>

                <!-- Resolutions -->
                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">RESOLUTION 
                        <button
                            class="btn ms-auto" type="button" data-bs-toggle="collapse"
                            data-bs-target="#RESOLUTION" aria-expanded="false" aria-controls="RESOLUTION">
                        </button> 
                    </div>
                    <div id="RESOLUTION" class="collapse show">

                        <div class="my-1">
                            <label class="tick"> 1080p 60fps <input type="radio" name="resolution" value="1080p 60fps"> 
                                <span class="check"></span>
                            </label>
                        </div>

                        <div class="my-1">
                            <label class="tick"> 720p <input type="radio" name="resolution" value="720p">
                                <span class="check"></span>
                            </label>
                        </div>

                        <div class="my-1">
                            <label class="tick"> 4Ks <input type="radio" name="resolution" value="4Ks">
                                <span class="check"></span>
                            </label>
                        </div>

                    </div>
                </div>
                
                <!-- Camera Packages -->
                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Camera Package 
                        <button
                            class="btn ms-auto" type="button" data-bs-toggle="collapse"
                            data-bs-target="#PACK_NAME" aria-expanded="false" aria-controls="PACK_NAME">
                        </button> 
                    </div>
                    <div id="PACK_NAME" class="collapse show">

                        <div class="my-1">
                            <label class="tick"> 2 Camera Package <input type="checkbox" name="pack_name" value="2 Camera ALL-In Package">
                                <span class="check"></span>
                            </label>
                        </div>

                        <div class="my-1">
                            <label class="tick"> 3 Camera Package <input type="checkbox" name="pack_name" value="3 Camera ALL-In Package">
                                <span class="check"></span>
                            </label>
                        </div>

                        <div class="my-1">
                            <label class="tick"> 4 Camera Package <input type="checkbox" name="pack_name" value="4 Camera ALL-In Package">
                                <span class="check"></span>
                            </label>
                        </div>

                        <div class="my-1">
                            <label class="tick"> 5 Camera Package <input type="checkbox" name="pack_name" value="5 Camera ALL-In Package">
                                <span class="check"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Package Informations -->
            <div class="container mt-10 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-center">
                @foreach ($data as $packages)
                    @php
                        $resolutionId = ($packages->resolution)->resolution_desc;
                        $brandName = $packages->brand->brand_name;
                        $packName = $packages->pack_name;
                    @endphp

                    <div class="row justify-content-center" id="package_listing">

                        <div class="col-md-10">
                        <h1>Select from our <span style="color: red;">{{ $brandName }}</span> All-in Packages!</h1>
                        </div>

                        <div class="col-md-10 package-card">
                            <div class="package-header" style="color:red">
                            <h2>{{($packages->resolution)->resolution_desc}}</h2>
                                <h2>{{ $packName }}</h2>
                            </div>
                            

                            <div class="package-body">
                                <p>{{ $packages->pack_description }}</p>
                                <h5>FREE INSTALLATION!!!! - with 1 YEAR Parts and Service Warranty</h5>
                                <p>All Additional wiring included as long as it is in one establishment, Waterproof junction boxes, Phone binding, and Labor cost.</p>
                                
                                <div class="inclusions col-md-6">
                                    <h5>Inclusions:</h5>
                                    @foreach ($item_lists as $item_list)
                                        @php
                                            $itemPackageId = $item_list->package_id;
                                        @endphp

                                        @if ($packages->id == $itemPackageId)
                                            @php
                                                $itemName = $item_list->item->product_name;
                                                $itemQty = $item_list->item_qty;
                                                $itemUom = $item_list->item->uom->uom_shortname;
                                            @endphp
                                            <p>{{ $itemQty }} {{ $itemUom }} {{ $itemName }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="package-footer">
                                <h4>NO HIDDEN CHARGES!!!</h4>
                                <div class="technical-specs">
                                    <h5>Technical Specifications:</h5>
                                    <p>{!! nl2br($packages->technical_specification) !!}</p>
                                </div>

                                <div id="header">
                                    <a href="">Actual and Sample Piuctures and Videos - Click here!</a>
                                </div>  
                            </div>

                            <button>Call Us Today!</button>
                        </div>
                    </div>
                @endforeach
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
    // document.addEventListener("DOMContentLoaded", function () {
    //     const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    //     const radioButtons = document.querySelectorAll('input[type="radio"]');

    //     function filterProducts() {
    //         const selectedBrands = Array.from(document.querySelectorAll('input[name="brand"]:checked')).map(cb => cb.value);
    //         const selectedResolutions = Array.from(document.querySelectorAll('input[name="resolution"]:checked')).map(cb => cb.value);
    //         const selectedPackages = Array.from(document.querySelectorAll('input[name="pack_name"]:checked')).map(cb => cb.value);

    //         const products = document.querySelectorAll('.packages');
    //         let found = false; 

    //         products.forEach(product => {
    //             const brand = product.getAttribute('data-brand');
    //             const resolution = product.getAttribute('data-resolution');
    //             const pack = product.getAttribute('data-pack_name');

    //             if (
    //                 (selectedBrands.length === 0 || selectedBrands.includes(brand)) &&
    //                 (selectedResolutions.length === 0 || selectedResolutions.includes(resolution)) &&
    //                 (selectedPackages.length === 0 || selectedPackages.includes(pack)) &&
    //                 !found 
    //             ) {
    //                 product.style.display = "block";
    //                 found = true; 
    //             } else {
    //                 product.style.display = "none";
    //             }
    //         });
    //     }

    //     checkboxes.forEach(checkbox => {
    //         checkbox.addEventListener('change', filterProducts);
    //     });
    //     radioButtons.forEach(radioButton => {
    //         radioButton.addEventListener('change', filterProducts);
    //     });

    //     filterProducts();
    // });

function applyFilters() {
        var selectedBrands = [];
        $('input[name="brand"]:checked').each(function () {
            selectedBrands.push($(this).val());
        });

        $.ajax({
            url: '{{ route("packages.filter") }}',
            type: 'GET',
            data: {
                brands: selectedBrands
            },
            success: function (response) {
                $('#package_listing').html(response.html); // Update HTML content with filtered packages
            },
            error: function (xhr) {
                console.log('Error occurred while filtering packages.');
            }
        });
    }

    // Call applyFilters function when brand checkboxes are changed
    $(document).ready(function() {
    $('input[name="brand"]').change(function () {
        applyFilters();
    });
    // Repeat for resolutions and camera packages
});
</script>



</body>

</html>
