@extends('layouts.frontendapp')
@section('title', 'Gallery')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('frontend/images/slider-2.jpg') }}) ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>Gallery</h2>
                        <nav
                            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                            <ol class="breadcrumb justify-content-center mt-3">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumbs end -->
    <!-- gallery page content -->
    <section id="gallery_page">
        <div class="container">
            <div class="row filter_container">
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <a href="{{ asset('frontend/images/vission.jpg') }}" class="gallery" data-gall="gallery01">
                            <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <a href="{{ asset('frontend/images/vission.jpg') }}" class="gallery" data-gall="gallery01"><img
                                src="{{ asset('frontend/images/vission.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <a href="{{ asset('frontend/images/vission.jpg') }}" class="gallery" data-gall="gallery01"><img
                                src="{{ asset('frontend/images/vission.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <a href="{{ asset('frontend/images/vission.jpg') }}" class="gallery" data-gall="gallery01"><img
                                src="{{ asset('frontend/images/vission.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <a href="{{ asset('frontend/images/vission.jpg') }}" class="gallery" data-gall="gallery01"><img
                                src="{{ asset('frontend/images/vission.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <a href="{{ asset('frontend/images/vission.jpg') }}" class="gallery" data-gall="gallery01"><img
                                src="{{ asset('frontend/images/vission.jpg') }}" alt=""></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- gallery page content -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>

    <script>
        new VenoBox({
            selector: ".gallery",
            spinner: "flow",
            spinColor: "rgb(228, 1, 1) ",
            toolsColor: "rgb(228, 1, 1) ",
            border: "10px",
        });
    </script>
@endsection
