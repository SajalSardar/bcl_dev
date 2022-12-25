@extends('layouts.frontendapp')
@section('title', 'Home')
@section('content')
    <!-- banner part  -->
    <section id="banner" class="swiper wow fadeInUp">
        <div class="swiper-wrapper">
            <div class="banner_items swiper-slide">
                <video muted="" playsinline="" autoplay="" loop="">
                    <source
                        src="https://rflbd.com/Application/storage/app/public/relativeContentPath/homeSlider/3e4eeae8c5c91a413e1a53966310092ehome_sliders.mp4"
                        type="video/mp4">
                </video>
            </div>
            <div class="banner_items swiper-slide" style="background: url(images/slider-2.jpg')}});">
                <div class="container banner_content">
                    <div class="col-lg-6 col-md-10">
                        <h2>OUR COMPANY</h2>
                        <p>NASSA Group has interests in Garment Manufacturing, Banking, Real Estate, Stock Brokering,
                            Education and
                            Travel and most importantly Corporate Social Responsibility</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-next">
            <i class="fas fa-long-arrow-alt-right"></i>
        </div>
        <div class="swiper-prev">
            <i class="fas fa-long-arrow-alt-left"></i>
        </div>
    </section>
    <!-- banner part end -->

    <!-- about part  -->
    <section id="home_about" class="wow fadeInUp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="about_box">
                        <h3>20</h3>
                        <p>YEARS SINCE INCEPTION</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="about_title">
                        <h2>About <span>Barisons</span> Creations Ltd.</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_text">
                        <p>The self-sustaining planet Earth We live in this sphere. It's a house we lovingly recognize.
                            Over the
                            past
                            decade, we have dedicated our efforts to reveal human spirit for the Earth's, including all
                            of its
                            surroundings, to grow harmoniously.These exact efforts and tireless attempts of ours to...
                        </p>
                        <a href="#" class="custom_btn">Read More <i class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end -->

    <!-- counter part  -->
    <section id="counter_part" class="section_bg_style wow fadeInUp"
        style="background: url({{ asset('frontend/images/slider-2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter_item">
                        <div class="counter_icon">
                            <i class="fa-solid fa-people-roof"></i>
                        </div>
                        <div class="counter_text">
                            <h2><span class="counter">30000</span>+</h2>
                            <h3>Peoples</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter_item">
                        <div class="counter_icon">
                            <i class="fa-solid fa-earth-americas"></i>
                        </div>
                        <div class="counter_text">
                            <h2><span class="counter">500</span>+</h2>
                            <h3>Countries</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter_item">
                        <div class="counter_icon">
                            <i class="fa-solid fa-house-chimney-user"></i>
                        </div>
                        <div class="counter_text">
                            <h2><span class="counter">150</span>+</h2>
                            <h3>Clients</h3>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter_item">
                        <div class="counter_icon">
                            <i class="fa-solid fa-file-export"></i>
                        </div>
                        <div class="counter_text">
                            <h2><span class="counter">12154</span>+</h2>
                            <h3>Export volume</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- counter part end -->


    <!-- Company -->
    <section id="company" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading ">
                        <h2>Our <span>Company</span></h2>
                        <p>The key to a bright future for bangladesh is Sustainability</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="company_itme">
                        <img src="{{ asset('frontend/images/05.svg') }}" alt="">
                        <h3>PEOPLE</h3>
                        <p>Through a variety of educational and healthcare initiatives, we uphold a corporate culture
                            that supports
                            the professional growth of more than 30,000 employees, as well as in their families and
                            communities.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="company_itme">
                        <img src="{{ asset('frontend/images/05.svg') }}" alt="">
                        <h3>ADVANCEMENT IN TECHNOLOGY</h3>
                        <p>We regularly make investments in the most advanced computer-aided manufacturing technologies
                            from
                            the US and Europe. This enhances the efficiency of our supply chain and achieves the
                            consistent quality
                            and newness to market our clients expect.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="company_itme">
                        <img src="{{ asset('frontend/images/05.svg') }}" alt="">
                        <h3>QUALITY</h3>
                        <p>Our own group of expert merchandisers, quality controllers, and customer support
                            representatives is
                            educated to the highest standards of quality control.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="company_itme">
                        <img src="{{ asset('frontend/images/05.svg') }}" alt="">
                        <h3>ENVIRONMENT</h3>
                        <p>Through a variety of educational and healthcare initiatives, we uphold a corporate culture
                            that supports
                            the professional growth of more than 30,000 employees, as well as in their families and
                            communities.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="company_itme">
                        <img src="{{ asset('frontend/images/05.svg') }}" alt="">
                        <h3>GROWTH</h3>
                        <p>We regularly make investments in the most advanced computer-aided manufacturing technologies
                            from
                            the US and Europe. By doing this, we improve the effectiveness of our supply chain and
                            deliver the
                            consistent quality and novelty that our clients want.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="company_itme">
                        <img src="{{ asset('frontend/images/05.svg') }}" alt="">
                        <h3>SERVICE</h3>
                        <p>Our own group of expert merchandisers, quality controllers, and customer support
                            representatives is
                            educated to the highest standards of quality control.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Company end -->

    <!-- mession and vission -->
    <section id="mission_vission" class="wow fadeInUp">
        <div class="container">
            <div class="row align-items-center mission_vission_row">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="vission_left_img">
                        <img src="{{ asset('frontend/images/vission.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission">
                        <div class="vission_icon">
                            <i class="fa-regular fa-chess-pawn"></i>
                        </div>
                        <div class="vission_text">
                            <h3>Mission</h3>
                            <p>And where Bangladesh's upcoming generations have the knowledge, resources, and zeal to
                                carry out
                                that vision.</p>
                        </div>
                    </div>
                    <div class="mission">
                        <div class="vission_icon">
                            <i class="fa-solid fa-eye-low-vision"></i>
                        </div>
                        <div class="vission_text">
                            <h3>Vissoin</h3>
                            <p>And where Bangladesh's upcoming generations have the knowledge, resources, and zeal to
                                carry out
                                that vision.</p>
                        </div>
                    </div>
                    <div class="mission">
                        <div class="vission_icon">
                            <i class="fa-solid fa-chess-queen"></i>
                        </div>
                        <div class="vission_text">
                            <h3> Stratgey</h3>
                            <p>And where Bangladesh's upcoming generations have the knowledge, resources, and zeal to
                                carry out
                                that vision.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- mession and vission end -->

    <!-- Sustainability Practices -->
    <section id="sustainability" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading">
                        <h2>Sustainability <span>Practices</span></h2>
                        <p>The key to a bright future for bangladesh is Sustainability</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 sustainability_left d-none d-lg-block">
                    <img src="{{ asset('frontend/images/sustain.jpg') }}" class="w-100" alt="">
                </div>
                <div class="col-lg-6 ">
                    <div class="sustainability_right">
                        <p>As a Manufacturing Unit, we are committed to advancing sustainability's critical role in
                            ensuring a
                            promising future in business, society, and the environment. We do this by using:</p>
                        <ul>
                            <li><i class="fa-regular fa-share-from-square"></i> Our people: Developing their skills
                                through education
                                and
                                professional development Innovation
                                and technology: Purchasing the newest computer-aided manufacturing equipment commitment
                                to high standards of quality control</li>
                            <li><i class="fa-regular fa-share-from-square"></i> Service: Providing the best client care
                                possible and
                                ensuring supply chain accountability</li>
                            <li> <i class="fa-regular fa-share-from-square"></i>Implementing a three-year plan to cut
                                back on gas,
                                water, and effluent wastage.</li>
                        </ul>
                        <p>The Barison Creation Ltd. is fully devoted to its duty to promote the sustainability of its
                            operations,
                            of
                            its clientele, of its stakeholders, and of the local and natural environments.</p>
                        <a href="#" class="custom_btn">Read More <i class="fas fa-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sustainability Practices end -->

    <!-- Our value -->
    <section id="values_home" class="wow fadeInUp">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_heading text-center">
                        <h2>Our <span>Values</span></h2>
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-lg col-sm-6">
                    <div class="values_item">
                        <img src="{{ asset('frontend/images/integrity-01.png') }}" alt="">
                        <h3>integrity</h3>
                    </div>
                </div>
                <div class="col-lg col-sm-6">
                    <div class="values_item">
                        <img src="{{ asset('frontend/images/commitment-icon-2.png') }}" alt="">
                        <h3>commitment</h3>
                    </div>
                </div>
                <div class="col-lg col-sm-6">
                    <div class="values_item">
                        <img src="{{ asset('frontend/images/impartiality.png') }}" alt="">
                        <h3>impartiality</h3>
                    </div>
                </div>
                <div class="col-lg col-sm-6">
                    <div class="values_item">
                        <img src="{{ asset('frontend/images/passion.png') }}" alt="">
                        <h3>passion</h3>
                    </div>
                </div>
                <div class="col-lg col-sm-6">
                    <div class="values_item">
                        <img src="{{ asset('frontend/images/innovation-01.png') }}" alt="">
                        <h3>innovation</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our value end -->

    {{-- employee --}}
    <section class="wow fadeInUp pt-5">
        <div class="container">
            <div class="row align-items-center mission_vission_row">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="vission_left_img">
                        <img src="{{ asset('frontend/images/employee.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission">
                        <div class="vission_text">
                            <h3>Our Employees</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis consequatur dolorem, ipsa
                                commodi veniam repellendus eum ratione ad, ea fuga impedit aspernatur officia unde.
                                Consequuntur non nihil eaque voluptas commodi beatae neque, suscipit reprehenderit
                                voluptatibus enim corporis nam cupiditate optio eum excepturi blanditiis itaque nostrum!
                                Provident molestias, totam, odit corrupti quibusdam alias pariatur fugiat ipsa natus non
                                culpa nostrum quas impedit aspernatur ullam. Quia sunt facere reiciendis doloribus suscipit!
                                Aliquid quae explicabo et ea rerum maiores quis veniam eveniet pariatur laborum corrupti
                                cupiditate vero tempore eos cum repellendus omnis perspiciatis, placeat vitae? Sunt, quos.
                                Dolore maxime debitis distinctio consectetur excepturi.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
