@extends('layouts.frontendapp')
@section('title', 'About')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('frontend/images/slider-2.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>About Us</h2>
                        <nav
                            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                            <ol class="breadcrumb justify-content-center mt-3">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumbs end -->

    <!-- about main part  -->
    <section id="mission_vission" class="wow fadeInUp">
        <div class="container">
            <div class="row align-items-center mission_vission_row">

                <div class="col-md-12">
                    <div class="about_page">
                        <h3>About Barisons Creations Ltd.</h3>
                        <img src="{{ asset('frontend/images/sustain.jpg') }}" width="400" alt="">
                        <p>
                            The self-sustaining planet Earth We live in this sphere. It&#39;s a house we lovingly recognize.
                            Over the
                            past
                            decade, we have dedicated our efforts to reveal human spirit for the Earth&#39;s, including all
                            of its
                            surroundings, to grow harmoniously. These exact efforts and tireless attempts of ours to
                            comprehend
                            the goals and aspirations of our clients have forged a solid collaboration between us that
                            enables us to
                            develop successful state-of-the-art solutions to adapt, develop, and implement designs for a
                            constantly
                            changing environment. We specialize in knit, woven, denim, sweaters, formal wear for men, women,
                            &amp;
                            kids, T-shirts, polo shirts, aprons, casual shirts, coverall, and safety wear items.
                        </p>

                        <p>As woven manufacturer we know that woven must be hard wearing so that they can live up to the
                            demands of every day life. Our philosophy is to provide good quality, hard wearing .</p>
                        <p>From east to west, our products serve the entire world, including Europe, America, Africa, and
                            Asia.</p>
                        <p>We utilize top-notch raw materials and accessories to deliver affordable prices, the proper
                            quality, and
                            quick lead times. We also have a manufacturing facility of our own.</p>
                        <p>We uphold high standards for our business practices, ethics, and social obligations, and we
                            constantly
                            seek to implement the most cutting-edge and efficient technology available. We have management,
                            merchandisers, quality controllers, technical planners, commercial &amp; logistic staff, and
                            management on
                            our team.</p>
                        <p>Barisons Creations Ltd. started its journey as a house of Readymade Garments (RMG) engaged in
                            manufacturing and exporting of Knit Apparels since 2012 and has been considered today as one of
                            the
                            woven garments. Its cutting-edge garment production plant offers clients a one-stop shopping
                            experience. We have established ourselves as an important garments manufacturer for a number of
                            renowned brand apparels of Europe, USA &amp; Australia.Garments Divisions</p>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- about main part end -->


    <section id="about_page_block_main" class="wow fadeInUp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about_page_block_part">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="block_content">
                            <h3>Mission</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, nulla placeat? Facilis
                                dicta
                                consequatur id, cupiditate fugit aliquam laboriosam quia consequuntur officiis distinctio
                                enim expedita
                                eos quaerat maxime nostrum odio.</p>
                            <a href="#" class="custom_btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_page_block_part">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="block_content">
                            <h3>Vission</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, nulla placeat? Facilis
                                dicta
                                consequatur id, cupiditate fugit aliquam laboriosam quia consequuntur officiis distinctio
                                enim expedita
                                eos quaerat maxime nostrum odio.</p>
                            <a href="#" class="custom_btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_page_block_part">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="block_content">
                            <h3>Values</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, nulla placeat? Facilis
                                dicta
                                consequatur id, cupiditate fugit aliquam laboriosam quia consequuntur officiis distinctio
                                enim expedita
                                eos quaerat maxime nostrum odio.</p>
                            <a href="#" class="custom_btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_page_block_part">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                        <div class="block_content">
                            <h3>Strategy</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, nulla placeat? Facilis
                                dicta
                                consequatur id, cupiditate fugit aliquam laboriosam quia consequuntur officiis distinctio
                                enim expedita
                                eos quaerat maxime nostrum odio.</p>
                            <a href="#" class="custom_btn">Read More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
