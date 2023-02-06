<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link type="text/css" href="{{ asset('backend/css/perfect-scrollbar.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('backend/css/app.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('backend/css/vendor-material-icons.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('backend/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('backend/css/sweetalert2.min.css') }}" rel="stylesheet">

    @yield('style')


</head>

<body class="layout-default">

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
                    <div class="container-fluid p-0">

                        <!-- Navbar toggler -->

                        <button class="navbar-toggler navbar-toggler-right d-block d-lg-none" type="button"
                            data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Navbar Brand -->

                        <a href="{{ route('frontend.index') }}" target="_blank">

                            <x-application-logo />
                        </a>

                        <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                            <li class="nav-item dropdown">
                                <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                    data-caret="false">
                                    <i class="material-icons nav-icon navbar-notifications-indicator">notifications</i>
                                </a>
                                <div id="notifications_menu"
                                    class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                    <div class="dropdown-item d-flex align-items-center py-2">
                                        <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                        <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
                                    </div>
                                    <div class="navbar-notifications-menu__content" data-perfect-scrollbar>
                                        <div class="py-2">

                                            <div class="dropdown-item d-flex">
                                                <div class="mr-3">
                                                    <div class="avatar avatar-sm" style="width: 32px; height: 32px;">
                                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg"
                                                            alt="Avatar" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <a href="">A.Demian</a> left a comment on <a
                                                        href="">FlowDash</a><br>
                                                    <small class="text-muted">1 minute ago</small>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <a href="javascript:void(0);"
                                        class="dropdown-item text-center navbar-notifications-menu__footer">View
                                        All</a>
                                </div>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                            <li class="nav-item dropdown">
                                <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                    data-caret="false">
                                    <span class="mr-1 d-flex-inline">
                                        <span class="text-light">{{ auth()->user()->name }}</span>
                                    </span>
                                    <img src="{{ Avatar::create(auth()->user()->name)->setDimension(40)->setFontSize(16)->toBase64() }}"
                                        alt="">
                                    {{-- <img src="assets/images/avatar/demi.png" class="rounded-circle" width="32"
                                        alt="Frontted"> --}}
                                </a>
                                <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-item-text dropdown-item-text--lh">
                                        <div><strong>{{ auth()->user()->name }}</strong></div>
                                        <div class="text-muted">{{ auth()->user()->email }}</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item active" href="{{ route('dashboard.index') }}"><i
                                            class="material-icons">dvr</i>
                                        Dashboard</a>

                                    <a class="dropdown-item" target="_blank" href="{{ route('profile.edit') }}"><i
                                            class="material-icons">edit</i> Edit account</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                  this.closest('form').submit();">
                                            <i class="material-icons">exit_to_app</i>{{ __('Log Out') }}
                                        </a>
                                    </form>

                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                    @yield('content')

                </div>
                <!-- // END drawer-layout__content -->

                <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <div class="mdk-drawer__content">
                        <div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
                            <div class="sidebar-heading">Menu</div>
                            <ul class="sidebar-menu">
                                <li
                                    class="sidebar-menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                                    <a class="sidebar-menu-button" href="{{ route('dashboard.index') }}">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                        <span class="sidebar-menu-text">Dashboards</span>
                                    </a>
                                </li>
                                @if (Auth::user()->role === 'client')
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.order.client') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.order.client') }}">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                            <span class="sidebar-menu-text">Orders</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->role === 'admin')
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.order.*') ? 'active open' : '' }}">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#order_menu">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Order</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse" id="order_menu">
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.order.index') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.order.index') }}">
                                                    <span class="sidebar-menu-text">All Orders</span>
                                                </a>
                                            </li>
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.order.create') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.order.create') }}">
                                                    <span class="sidebar-menu-text">Create Order</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs(['dashboard.home-about.*', 'dashboard.home-mission.*', 'dashboard.employee.*']) ? 'active open' : '' }}">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#section_menu">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Home Page Section</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse" id="section_menu">
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.home-about.*') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.home-about.index') }}">
                                                    <span class="sidebar-menu-text"> About Section</span>
                                                </a>
                                            </li>
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.employee.*') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.employee.index') }}">
                                                    <span class="sidebar-menu-text"> Our Employees</span>
                                                </a>
                                            </li>
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.home-mission.*') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.home-mission.index') }}">
                                                    <span class="sidebar-menu-text">Mission Vission Section</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.slider.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.slider.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Slider</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.mission-vission.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button"
                                            href="{{ route('dashboard.mission-vission.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">About Page Block</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.counter.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.counter.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Counter</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.company.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.company.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Our Company</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.about.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.about.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">About Us</span>
                                        </a>
                                    </li>

                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs(['dashboard.product.*', 'dashboard.product-category.*']) ? 'active open' : '' }}">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#product_menu">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Products</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse" id="product_menu">
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.product.*') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.product.index') }}">
                                                    <span class="sidebar-menu-text">Product</span>
                                                </a>
                                            </li>
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.product-category.*') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.product-category.index') }}">
                                                    <span class="sidebar-menu-text">Category</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.sustainability.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button"
                                            href="{{ route('dashboard.sustainability.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Sustainability</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.gallery.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.gallery.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Gallery</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.contact.message') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button"
                                            href="{{ route('dashboard.contact.message') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Contact</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.contact.index') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.contact.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Contact Page</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.profile.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.profile.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Company Profile</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.value.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button" href="{{ route('dashboard.value.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Values</span>
                                        </a>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.social-link.*') ? 'active' : '' }}">
                                        <a class="sidebar-menu-button"
                                            href="{{ route('dashboard.social-link.index') }}">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Social Link</span>
                                        </a>
                                    </li>

                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.setting.*') ? 'active open' : '' }}">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#settings_menu">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Settings</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse" id="settings_menu">
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.setting.section') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.setting.section') }}">
                                                    <span class="sidebar-menu-text">Page Section Setting</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.setting.theme.option.edit') }}">
                                                    <span class="sidebar-menu-text">Theme Options</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li
                                        class="sidebar-menu-item {{ request()->routeIs('dashboard.user.*') ? 'active open' : '' }}">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#user_menu">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Users</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse" id="user_menu">
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.user.create') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.user.create') }}">
                                                    <span class="sidebar-menu-text">Add New User</span>
                                                </a>
                                            </li>
                                            <li
                                                class="sidebar-menu-item {{ request()->routeIs('dashboard.user.index') ? 'active' : '' }}">
                                                <a class="sidebar-menu-button"
                                                    href="{{ route('dashboard.user.index') }}">
                                                    <span class="sidebar-menu-text">All Users</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#client_menu">
                                            <i
                                                class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Client</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse" id="client_menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button" href="app-activities.html">
                                                    <span class="sidebar-menu-text">Client a</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                            </ul>


                            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                                <a href="{{ route('profile.edit') }}"
                                    class="flex d-flex align-items-center text-underline-0 text-body">
                                    <span class="avatar avatar-sm mr-2">
                                        <img src="{{ Avatar::create(auth()->user()->name)->setDimension(40)->setFontSize(16)->toBase64() }}"
                                            alt="">
                                        {{-- <img src="assets/images/avatar/demi.png" alt="avatar"
                                            class="avatar-img rounded-circle"> --}}
                                    </span>
                                    <span class="flex d-flex flex-column">
                                        <strong>{{ auth()->user()->name }}</strong>
                                        <small class="text-muted text-uppercase">{{ auth()->user()->role }}</small>
                                    </span>
                                </a>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="dropdown" data-caret="false"
                                        class="text-muted"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-item-text dropdown-item-text--lh">
                                            <div><strong>{{ auth()->user()->name }}</strong></div>
                                            <div class="text-muted">{{ auth()->user()->email }}</div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item active" href="{{ route('dashboard.index') }}"><i
                                                class="material-icons">dvr</i>
                                            Dashboard</a>
                                        <a class="dropdown-item" target="_blank"
                                            href="{{ route('profile.edit') }}"><i class="material-icons">edit</i>
                                            Edit account</a>
                                        <div class="dropdown-divider"></div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                  this.closest('form').submit();">
                                                <i class="material-icons">exit_to_app</i>{{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default"
            :layout-location="{
                'default': 'index.html',
                'fixed': 'fixed-dashboard.html',
                'fluid': 'fluid-dashboard.html',
                'mini': 'mini-dashboard.html'
            }">
        </app-settings>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('backend/js/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('backend/js/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('backend/js/material-design-kit.js') }}"></script>

    <!-- App -->
    <script src="{{ asset('backend/js/dropdown.js') }}"></script>
    <script src="{{ asset('backend/js/sidebar-mini.js') }}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('backend/js/app-settings.js') }}"></script>


    <!-- Global Settings -->
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>

    @include('flashmessage')

    @yield('script')


</body>

</html>
