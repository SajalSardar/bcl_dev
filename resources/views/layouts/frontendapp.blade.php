<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    @yield('css')
</head>

<body>
    <header id="top_header" class="wow fadeInUp">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-4">
                    <div class="header_contact">
                        <p><i class="fas fa-phone"></i> <a href="tel:0123654789">0123654789</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="header_menu">
                        <ul>
                            <li><a href="#"><i class="far fa-arrow-alt-circle-right"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-sm-4">
                    <div class="social_media">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- menu part  -->
    <nav class="navbar navbar-expand-lg wow fadeInUp" id="main_navigation">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="" width="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="main_menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('frontend.index') ? 'active' : '' }}"
                            href="{{ route('frontend.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('frontend.about') ? 'active' : '' }}"
                            href="{{ route('frontend.about') }}">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('frontend.product') ? 'active' : '' }}"
                            href="{{ route('frontend.product') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('frontend.sustainability') ? 'active' : '' }}"
                            href="{{ route('frontend.sustainability') }}">Sustainability</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('frontend.gallery') ? 'active' : '' }}"
                            href="{{ route('frontend.gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('frontend.contact') ? 'active' : '' }}"
                            href="{{ route('frontend.contact') }}">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('frontend.profile') ? 'active' : '' }}"
                            href="{{ route('frontend.profile') }}">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- menu part end -->

    @yield('content')

    <!-- footer part start  -->
    <footer id="footer" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer_contact">
                        <h4>Holytex Ltd.</h4>
                        <div class="d-flex">
                            <i class="fas fa-map-location"></i>
                            <p>
                                91, Sarwardi Avenue (2nd Floor)
                                Baridhara, Dhaka-1212, Bangladesh
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer_contact">
                        <h4>Barison Creation Ltd</h4>
                        <div class="d-flex">
                            <i class="fas fa-map-location"></i>
                            <p>Monipur (Uttarpara),Bhabanipur,
                                Bhawalgarh,Gazipur Sadar,Gazipur,
                                Bangladesh.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer_contact">
                        <h4>Contact</h4>
                        <ul>
                            <li><i class="fas fa-user"></i> Mr. Shafiq (Managing Director)</li>
                            <li><i class="fas fa-envelope"></i> holytex@btinternet.com</li>
                            <li><i class="fas fa-phone"></i> 0123546987</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer_contact">
                        <h4>Usefull Links</h4>
                        <ul>
                            <li><a href="#"><i class="far fa-arrow-alt-circle-right"></i>About</a></li>
                            <li><a href="#"><i class="far fa-arrow-alt-circle-right"></i>Services</a></li>
                            <li><a href="#"><i class="far fa-arrow-alt-circle-right"></i>Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row bottom_footer align-items-center">
                <div class="col-lg-3 col-md-3">
                    <div class="footer_logo">
                        <img src="{{ asset('frontend/images/Chaity-Group-Logo.png') }}" width="70"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="footer_copy text-center">
                        <p>Copyright &copy; 2022 Barison Creation Ltd. All right reserved</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="footer_social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end -->




    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>

    @yield('js')
</body>

</html>
