<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Barisons Creations LTD. is a leading clothing manufacturer in Bangladesh, headquartered in Dhaka, the center of the Bangladesh textile industry. We have been dedicated to clothing manufacturing since 2002, and we strive to follow the sector's evolution as closely as possible. Our manufacturing units have achieved a level of efficiency that places us among the most successful competitors in the sector on a national level.">
    <meta name="keywords"
        content="barisons, aided,advancement,asia, bangladesh,woven,business,clients,company,quality,creations,products,manufacturers,export,textile,garments,garments accessories,garments export,sustainability">
    <meta name="author" content="BARISONS CREATIONS LTD.">

    <meta property="og:title" content="Barisons Creations LTD. - Leading Clothing Manufacturer in Bangladesh
    ">
    <meta property="og:description"
        content="BARISONS CREATIONS LTD. is headquartered in Dhaka, Bangladesh, in the center of the Bangladesh textile industry, which is one of the most important textile-manufacturing locations in the Asia.">
    <meta property="og:image" content="http://barisons-bd.com/storage/uploads/4cb52094-fad2-4afe-9e8a-3195d872fc3d.jpg">
    <meta property="og:url" content="http://barisons-bd.com/">

    <meta name="twitter:title" content="Barisons Creations LTD. - Leading Clothing Manufacturer in Bangladesh">
    <meta name="twitter:description"
        content="Barisons Creations LTD. is a leading clothing manufacturer in Bangladesh, headquartered in Dhaka, the center of the Bangladesh textile industry. We have been dedicated to clothing manufacturing since 2002, and we strive to follow the sector's evolution as closely as possible. Our manufacturing units have achieved a level of efficiency that places us among the most successful competitors in the sector on a national level.">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/uploads/' . $themeOption->logo) }}" />
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
    <link type="text/css" href="{{ asset('backend/css/sweetalert2.min.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    @if ($masterSectionSettings['topHeader'] === 1)
        <header id="top_header" class="wow fadeInUp">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-4">
                        <div class="header_contact">
                            <p><i class="fas fa-phone"></i> <a
                                    href="tel:{{ $themeOption->header_number }}">{{ $themeOption->header_number }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="header_menu">
                            <ul>
                                @guest()
                                    <li><a href="{{ route('login') }}"><i class="far fa-arrow-alt-circle-right"></i>
                                            Login</a>
                                    </li>
                                @else
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                      this.closest('form').submit();">
                                                <i class="far fa-arrow-alt-circle-right"></i> {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                    <div class=" col-sm-4">
                        <div class="social_media">
                            <ul>
                                @foreach ($socialLinks as $socialLink)
                                    <li><a target="_blank" href="{{ $socialLink->link }}"><i
                                                class="fab {{ $socialLink->icon }}"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endif
    <!-- menu part  -->
    @if ($masterSectionSettings['mainMenu'] === 1)
        <nav class="navbar navbar-expand-lg wow fadeInUp" id="main_navigation">
            <div class="container">
                <a class="navbar-brand" href="{{ route('frontend.index') }}">
                    <img src="{{ asset('storage/uploads/' . $themeOption->logo) }}" alt="{{ config('app.name') }}">
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
                            <a class="nav-link {{ Route::is('frontend.compliance') ? 'active' : '' }}"
                                href="{{ route('frontend.compliance') }}">Compliance</a>
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
    @endif
    <!-- menu part end -->

    @yield('content')

    <!-- footer part start  -->
    <footer id="footer" class="wow fadeInUp">
        <div class="container">
            @if ($masterSectionSettings['mainFooter'] === 1)
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_contact">
                            <h4>{{ $themeOption->footer_one_title }}</h4>
                            {!! $themeOption->footer_one !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_contact">
                            <h4>{{ $themeOption->footer_two_title }}</h4>
                            {!! $themeOption->footer_two !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_contact">
                            <h4>{{ $themeOption->footer_three_title }}</h4>
                            {!! $themeOption->footer_three !!}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer_contact">
                            <h4>{{ $themeOption->footer_four_title }}</h4>
                            {!! $themeOption->footer_four !!}
                        </div>
                    </div>
                </div>
            @endif
            @if ($masterSectionSettings['bottomFooter'] === 1)
                <div class="row bottom_footer align-items-center">
                    <div class="col-lg-3 col-md-3">
                        <div class="footer_logo">
                            <img src="{{ asset('storage/uploads/' . $themeOption->logo) }}"
                                alt="{{ config('app.name') }}">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="footer_copy text-center">
                            <p>{{ $themeOption->bottom_footer }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <ul class="footer_social">
                            @foreach ($socialLinks as $socialLink)
                                <li><a target="_blank" href="{{ $socialLink->link }}"><i
                                            class="fab {{ $socialLink->icon }}"></i></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
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
    <script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>

    @include('flashmessage')
    @yield('js')
</body>

</html>
