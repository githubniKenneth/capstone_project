@extends('website.layout')
@section('content')

    <main>    
        @include('website.header')
        <div class="welcome">
            <h2>Welcome to Citi Security!</h2>
            <p>Get your security cameras and be secured now</p>
        </div>
    </main>
    
        

    <!-- about section starts  -->

    <section id="about" class="about container">

        <div class="row align-items-center">

            <div class="col-md-6 image">
                <img src="{{URL('assets/images/about4.jpg')}}" width="90%" alt="">
            </div>

            <div class="col-md-6 info">
                <h2>CCTV FOR YOUR "SAFETY"</h2>
                <hr>
                <p>“Security camera installation in your home, office or building is one of the smartest decisions you
                    can make in order to protect yourself from unexpected losses. Security cameras besides keeping an
                    eye on all your belongings also give you satisfaction and peace of mind that comes with the
                    knowledge that you can always keep an eye on the estate. With the increase in the crime rates, CCTV
                    cameras installation in your home and businesses has become a necessity.
                    You can contact us at anytime and we are available round the clock to serve you.”
                </p>
                <!-- <a href="about"><button type="button" class="btn btn-warning"   style="background-color:#ffd249c2">Read more</button></a> -->
            </div>

        </div>
    </section>

    <!-- about section ends -->
    
    <!-- counter start-->

    <section class="py-4 story-section" style="visibility: visible; animation-name: fadeIn;">
        <div class="sectiontitle mb-5">
            <h2>OUR STORY IN NUMBERS</h2>
            <span class="headerLine"></span>
        </div>
        <div class="container">
            <div class="row">
                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
                    data-wow-duration="300ms"
                    style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <i class="bi bi-1-circle-fill"></i>
                    <span id="anim-number-pizza" class="counter-number"></span>
                    <span class="timer counter alt-font appear" data-to="980" data-speed="7000">289+</span>
                    <p class="counter-title">Installations in a Month</p>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated"
                    data-wow-duration="600ms"
                    style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <i class="bi bi-2-circle-fill"></i>
                    <span class="timer counter alt-font appear" data-to="980" data-speed="7000">24</span>
                    <span class="counter-title">Tech Experts Working</span>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated"
                    data-wow-duration="900ms"
                    style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                    <i class="bi bi-3-circle-fill"></i>
                    <span class="timer counter alt-font appear" data-to="810" data-speed="7000">2304+</span>
                    <span class="counter-title">Clients Nationwide</span>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated"
                    data-wow-duration="1200ms"
                    style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                    <i class="bi bi-4-circle-fill large-icon"></i>
                    <span class="timer counter alt-font appear" data-to="600" data-speed="7000">100%</span>
                    <span class="counter-title">Satisfied Customers</span>
                </div>
                <!-- end counter -->
            </div>
        </div>
    </section>

    
    <!-- service section starts  -->
    <section class="services" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <!-- section title -->
                <div class="col-xl-6 col-lg-8">
                    <div class="title text-center">
                        <h2>Our Services</h2>
                        <span class="headerLine"></span>
                        <p> From Citi Group of Companies, Citi Security and Technology offers wide range of Home
                            Automation and Security. We provide top-notch quality products that comes with 24/7
                            technical support.</p>
                        <div class="border"></div>
                    </div>
                </div>
                <!-- /section title -->
            </div>
            <div class="row no-gutters">

                <!-- Single Service Item -->
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4 color-bg text-center">
                        <div class="service-icon text-center">
                           
                        </div>
                        <h2>CCTV Installation</h2>
                        <p>CITI Security & Technology have made it simpler and more efficient than ever before to set up
                            CCTV
                            Camers, we provide superior services in the istallation of CCTV.</p>
                    </div>
                </div>
                <!-- End Single Service Item -->

                <!-- Single Service Item -->
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4 text-center">
                        <div class="service-icon text-center">
                          
                        </div>
                        <h2>Internet/Network Cabling</h2>

                        <p>CITISec specializes in the highest quality installation of all forms of certified voice and
                            data
                            cabling including Category 5e, Category 6, fiber-optic, buried, aerial and for wireless
                            networks.
                        </p>
                    </div>
                </div>
                <!-- End Single Service Item -->

                <!-- Single Service Item -->
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4 color-bg text-center">
                        <div class="service-icon text-center">
                          
                        </div>
                        <h2>CCTV Rehabilitation</h2>
                        <p>CITI Security & Technology offers rehabilitation or repair on your old CCTV system. We
                            alsodiscuss
                            every detail if your old CCTV system is worth to repair or need an upgrade.</p>
                    </div>
                </div>
                <!-- End Single Service Item -->

                <!-- Single Service Item -->
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4  text-center">
                        <div class="service-icon text-center">
                            
                        </div>
                        <h2>CCTV Rehabilitation</h2>
                        <p>CITI Security & Technology offers rehabilitation or repair on your old CCTV system. We
                            alsodiscuss
                            every detail if your old CCTV system is worth to repair or need an upgrade.</p>
                    </div>
                </div>
                <!-- End Single Service Item -->

                <!-- Single Service Item -->
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4 color-bg text-center">
                        <div class="service-icon text-center">
                           
                        </div>
                        <h2>CTTV Maintenance</h2>
                        <p>CITI Security & Technology provides Maintenance and check-up on your existing CCTV system, to
                            prevent
                            any problem when its needed the most.</p>
                    </div>
                </div>
                <!-- End Single Service Item -->

                <!-- Single Service Item -->
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4 text-center">
                        <div class="service-icon text-center">
                          
                        </div>
                        <h2>Structured Cabling</h2>
                        <p>CITI Security & Technology offers Structured cabling and layout during or before the start of
                            the
                            construction. To avoid unnecessary wires and chipping works.</p>
                    </div>
                </div>
                <!-- End Single Service Item -->

            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>

    <!-- service section ends -->

    

    <section id="contact" class="contact">
        <h1 class="heading">Direct Contact To Our Near Branch</h1>
            <div class="box-container mx-auto">
            @foreach ($data['branch'] as $branch)

                <div class="box">
                    <h2> {{ $branch->branch_name }} </h2>
                    <hr>      
                    <p> {{ $branch->full_address }} </p>
                    <p> {{ $branch->branch_tele_no }} </p>
                    <p> {{ $branch->branch_phone_no }} </p>
                    <p> {{ $branch->branch_email }} </p>
                </div>
                @endforeach
            </div>
    </section>

    <!-- footer section starts  -->

    
    @include('website.footer')
@endsection