@extends('layouts.frontendapp')
@section('title', 'Product')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('storage/uploads/' . $page_banner->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>Product</h2>
                        <nav
                            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                            <ol class="breadcrumb justify-content-center mt-3">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumbs end -->
    <!-- product page main part  -->
    <section id="product_page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_menu wow fadeInUp">
                        <ul>
                            <li class="active" data-filter="all">All</li>
                            @foreach ($categories as $category)
                                <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row filter_container">
                @foreach ($products as $product)
                    <div class="col-lg-4 {{ $product->category->slug }} mix wow fadeInUp ">
                        <div class="product_block">
                            <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->title }}">
                            <div class="product_caption">
                                <div>
                                    <a href="{{ asset('storage/product/' . $product->image) }}" class="productitme"
                                        data-gall="productgall"><i class="fas fa-plus"></i></a>
                                    <h4>{{ $product->title }}</h4>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- product page main end -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script>
        var mixer = mixitup('.filter_container');

        new VenoBox({
            selector: ".productitme",
            spinner: "flow",
            spinColor: "rgb(228, 1, 1) ",
            toolsColor: "rgb(228, 1, 1) ",
            border: "10px",
        });
    </script>
@endsection
