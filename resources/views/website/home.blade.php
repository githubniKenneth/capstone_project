@extends('website.layout')
@section('content')

    <main class="main fade-in" id="home">    
        @include('website.header')
        <div class="welcome">
            <h2 class="font-1">Welcome to Citi Security</h2>
            <p class="font-2 mb-5">Be Smart, Be Secured</p>
            <a class="rounded quote-btn font-1" href=" {{ route('website-quotation.index'); }} ">
                Send Quotation
            </a>
        </div>
    </main>
    
        
    <section id="about" class="pt-5 MV fade-in">
        <h2 class="text-center">Mission & Vission</h2>
        <div class="box-container">
            <div class="box">
                <h2>Our Mission</h2>
                <hr>
                <p>At Citi Technology & Security, we are committed to providing the best image surveillance experience
                    through superior products, cutting-edge technology and world class customer service. We are dedicated to
                    providing our clients with the best possible support, quality products at fair prices backed with
                    exceptional expertise in the security and automation.</p>
            </div> 
            <div class="box">
                <h2>Our Vision</h2>
                <hr>
                <p>We are aiming to be one of the country’s leading provider of products and services which would help
                address the security and technology problem of every Filipino.</p>
            </div>
        </div>
    </section>
    <!-- about section starts  -->

    <section class="about bg-2 fade-in">
        <div class="d-flex align-items-center">
            <div class="col-md-6 image">
                <img src="{{URL('assets/images/about4.jpg')}}" width="90%" alt="">
            </div>
            <div class="col-md-6 info">
                <h2>CCTV for your Safety</h2>
                <hr>
                <p>“Security camera installation in your home, office or building is one of the smartest decisions you
                    can make in order to protect yourself from unexpected losses. Security cameras besides keeping an
                    eye on all your belongings also give you satisfaction and peace of mind that comes with the
                    knowledge that you can always keep an eye on the estate. With the increase in the crime rates, CCTV
                    cameras installation in your home and businesses has become a necessity.
                    You can contact us at anytime and we are available round the clock to serve you.”
                </p>
            </div>
        </div>
    </section>  

    <section class="py-4 story-section fade-in">
        <div class="sectiontitle mb-5">
            <h2>Our story in numbers</h2>
            <span class="headerLine"></span>
        </div>
        <div class="container">
            <div class="row">
                
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated d-flex flex-column"
                    data-wow-duration="300ms"
                    style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <div class="py-4">
                        <span class="timer counter alt-font appear" data-to="980" data-speed="7000">289+</span>
                        <p class="counter-title">Installations in a Month</p> 
                    </div>
                    
                    <i class="fa-solid fa-screwdriver-wrench fa-5x "></i>
                </div>
                
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated d-flex flex-column"
                    data-wow-duration="600ms"
                    style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <div class="py-4">
                        <span class="timer counter alt-font appear" data-to="980" data-speed="7000">24</span>
                        <span class="counter-title">Tech Experts Working</span>
                    </div>
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>
                
                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated d-flex flex-column"
                    data-wow-duration="900ms"
                    style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                    <div class="py-4">
                        <span class="timer counter alt-font appear" data-to="810" data-speed="7000">2304+</span>
                        <span class="counter-title">Clients Nationwide</span> 
                    </div>
                    <i class="fa-solid fa-people-roof fa-5x"></i>
                </div>
                
                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated d-flex flex-column"
                    data-wow-duration="1200ms"
                    style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                    <div class="py-4">
                        <span class="timer counter alt-font appear" data-to="600" data-speed="7000">100%</span>
                        <span class="counter-title">Satisfied Customers</span> 
                    </div>
                    <i class="fa-solid fa-thumbs-up fa-5x"></i>
                </div>
                
            </div>
        </div>
    </section>

    <section class="services fade-in bg-2" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="title text-center mb-2">
                        <h2>Our Services</h2>
                        <span class="headerLine"></span>
                        <p> From Citi Group of Companies, Citi Security and Technology offers wide range of Home
                            Automation and Security. We provide top-notch quality products that comes with 24/7
                            technical support.</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
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
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4 color-bg text-center">
                        <div class="service-icon text-center">
                          
                        </div>
                        <h2>CCTV Rehabilitation</h2>
                        <p>CITI Security & Technology offers rehabilitation or repair on your old CCTV system. We
                            also discuss
                            every detail if your old CCTV system is worth to repair or need an upgrade.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="service-block p-4  text-center">
                        <div class="service-icon text-center">
                            
                        </div>
                        <h2>CCTV Rehabilitation</h2>
                        <p>CITI Security & Technology offers rehabilitation or repair on your old CCTV system. We
                            also discuss
                            every detail if your old CCTV system is worth to repair or need an upgrade.</p>
                    </div>
                </div>
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
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>

    <section class="py-4 fade-in" id="contact">
        <div class="sectiontitle mb-5">
            <h2>Contact Us</h2>
            <span class="headerLine"></span>
        </div>
        <div class="container d-flex">
                <div class="col-md-4 p-3">
                    <h2 class="text-center">MANILA (MAIN)</h2>
                    <hr>      
                    <p> 2675 Pinoy St. Brgy. 135 Balut Tondo Manila</p>
                    <p> (046)-866-7729 </p>
                    <p> +639770553036 </p>
                    <p> citisec2020@gmail.com </p>
                </div>
                <div class="col-md-4 p-3">
                        <h2 class="text-center">Batangas</h2>
                        <hr>      
                        <p> Sitio Pulo 7B Brgy. Tambo, Lipa City Batangas </p>
                        <p> (046)-866-7729 </p>
                        <p> +639770553036 </p>
                        <p> citisec2020@gmail.com </p>
                </div>
                <div class="col-md-4 p-3">
                        <h2 class="text-center">Cavite</h2>
                        <hr>      
                        <p> B38 L23 P1 Cityhomes Resortsville Langkaan 2 Dasmariñas Cavite </p>
                        <p> (046)-866-7729 </p>
                        <p> +639770553036 </p>
                        <p> citisec2020@gmail.com </p>
                </div>
                <!-- <div class="col-md-3 m-2">
                    <h2 class="text-center">Bulacan</h2>
                    <hr>      
                    <p> B38 L23 P1 Cityhomes Resortsville Langkaan 2 Dasmariñas Cavite </p>
                    <p> (046)-866-7729 </p>
                    <p> +639770553036 </p>
                    <p> citisec2020@gmail.com </p>
                </div> -->
        </div>
    </section>

    <footer class="footer bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h4>About Us</h4>
                    <p>At Citi Security & Technology, we are dedicated to providing top-notch security solutions. Our mission is to ensure that you are always secure and connected with the best technology available.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-white">Home</a></li>
                        <li><a href="#about" class="text-white">About</a></li>
                        <li><a href="#products" class="text-white">Products</a></li>
                        <li><a href="#services" class="text-white">Services</a></li>
                        <li><a href="#contact" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h4>Contact Us</h4>
                    <p><i class="fa-solid fa-location-dot"></i> 2675 Pinoy St. Brgy. 135 Balut Tondo Manila</p>
                    <p><i class="fa-solid fa-phone"></i> (046)-866-7729</p>
                    <p><i class="fa-solid fa-envelope"></i> citisec2020@gmail.com</p>
                    <p>Follow us on:
                        <a href="#" class="text-white"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fa-brands fa-linkedin"></i></a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <p>&copy; 2024 Citi Security & Technology. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    
    

    <!-- <section id="contact" class="contact">
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
    </section> -->

    <!-- footer section starts  -->

    
@endsection