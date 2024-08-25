@extends('website.layout')
@section('content')

@include('website.header')

<div class="w-100 p-3 product-form d-flex">
    <div class="filter col-2">
        <div id="content">
            <div class="border-bottom h5 text-uppercase">Filter By</div>
            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">BRANDS
                    <button
                        class="btn ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#BRANDS" aria-expanded="false" aria-controls="BRANDS">
                    </button> 
                </div>
                <div id="BRANDS" class="collapse show"> 
                    @foreach ($brands as $brand)
                        <div class="my-1">
                            <label class="tick"> {{$brand->brand_name}} <input type="checkbox" name="brand" value="{{$brand->id}}">
                                <span class="check"></span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">RESOLUTION 
                    <button
                        class="btn ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#RESOLUTION" aria-expanded="false" aria-controls="RESOLUTION">
                    </button> 
                </div>
                <div id="RESOLUTION" class="collapse show">
                    @foreach ($camera_resolutions as $resolution)
                        <div class="my-1">
                            <label class="tick"> {{ $resolution->resolution_desc }} <input type="checkbox" name="resolution"  value="{{$resolution->id}}">
                                <span class="check"></span>
                            </label>
                        </div>
                    @endforeach
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
                    @foreach ($series as $series_data)
                        <div class="my-1">
                            <label class="tick"> {{ $series_data->series_name }} <input type="checkbox" name="series"  value="{{$series_data->id}}">
                                <span class="check"></span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="products col-10 p-3">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 "> <!-- text-center -->
                    <div class="row justify-content-center">
                        @foreach ($items as $item)
                            <div class="col-md-4 mb-3 product-card" 
                            data-brand="{{ $item->brand->id }}" 
                            data-resolution="{{ optional($item->resolution)->id }}" 
                            data-series="{{ optional($item->series)->id }}">
                                <div class="card" style="width: 430px;">
                                    <div class="d-flex justify-content-center" style="background-color:rgba(211, 206, 206, 0.397); padding:30px">
                                        <img src="{{ asset('storage/uploads/itemImages/' . basename($item->file_path)) }}"
                                        alt="Product Image" class="card-img-top" style="max-width: 200px; height: 200px;">
                                    </div>

                                    <div class="p-4">
                                        <h3 class="card-title mb-5">{{ $item->product_name }}</h3>
                                        <div class="mb-2">
                                            <p><b>Technical Specification:</b></p>
                                            Resolution: {{ optional($item->resolution)->resolution_desc }} <br>
                                            Brand: {{ optional($item->brand)->brand_name }} <br>
                                            Series: {{ optional($item->series)->series_name }} <br>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const radioButtons = document.querySelectorAll('input[type="radio"]');


        function filterProducts() {
            const selectedBrands = Array.from(document.querySelectorAll('input[name="brand"]:checked')).map(cb => cb.value);
            const selectedResolution = Array.from(document.querySelectorAll('input[name="resolution"]:checked')).map(cb => cb.value);
            const selectedSeries = Array.from(document.querySelectorAll('input[name="series"]:checked')).map(cb => cb.value);

            const products = document.querySelectorAll('.product-card');
            products.forEach(product => {
                const brand = product.getAttribute('data-brand');
                const resolution = product.getAttribute('data-resolution');
                const series = product.getAttribute('data-series');

                if (
                    (selectedBrands.length === 0 || selectedBrands.includes(brand)) &&
                    (selectedResolution.length === 0 || selectedResolution.includes(resolution)) &&
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