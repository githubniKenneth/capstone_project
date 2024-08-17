<!-- <header>
    <nav>
        <div>
            <a href="{{ route('home') }}">Logo</a>
        </div>
        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="">Products</a>
            <a href="{{ route('home') }}#contact">Contact</a>
            <a href="{{ route('home') }}#services">Services</a>
        </div>
    </nav>
</header> -->

<header>
            <nav>
                <div class="logo">
                    <img src="{{ url('/assets/images/logo.png') }}" alt="Your Business Logo" class="logo-img">
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('home'); }}">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="{{ route('product'); }}">Products</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </header>
