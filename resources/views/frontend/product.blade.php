@extends('layouts.frontendapp')
@section('title', 'Product')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('frontend/images/slider-2.jpg') }})">
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
                            <li data-filter=".men">Mens</li>
                            <li data-filter=".women">Women</li>
                            <li data-filter=".child">Child</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row filter_container">
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix women wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix child wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix men wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix child wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix child women wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 men mix wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix women wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix child wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix men wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix child wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mix child women wow fadeInUp">
                    <div class="product_block">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="product_caption">
                            <div>
                                <h4>product title</h4>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quidem quisquam cumque
                                    incidunt
                                    expedita quia distinctio voluptate reiciendis nisi impedit.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- product page main end -->
@endsection


@section('js')
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script>
        var mixer = mixitup('.filter_container');
    </script>
@endsection
