@extends('layouts.frontendapp')
@section('title', 'Home')
@section('content')
    <!-- banner part  -->
    @if ($masterSectionSettings['slider'] === 1)
        <section id="banner" class="swiper wow fadeInUp">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    @if ($slider->slide_type === 'video')
                        <div class="banner_items swiper-slide">
                            <video muted="" playsinline="" autoplay="" loop="">
                                <source src="{{ asset('storage/slide/' . $slider->slide) }}" type="video/mp4">
                            </video>
                        </div>
                    @else
                        <div class="banner_items swiper-slide"
                            style="background: url({{ asset('storage/slide/' . $slider->slide) }})">
                            <div class="container banner_content">
                                <div class="col-lg-6 col-md-10">
                                    <h2>{{ $slider->title }}</h2>
                                    <p>{{ $slider->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-next">
                <i class="fas fa-long-arrow-alt-right"></i>
            </div>
            <div class="swiper-prev">
                <i class="fas fa-long-arrow-alt-left"></i>
            </div>
        </section>
    @endif
    <!-- banner part end -->

    <!-- about part  -->
    @if ($masterSectionSettings['homeAbout'] === 1)
        <section id="home_about" class="wow fadeInUp">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="about_box">
                            <h3>{{ $home_about->year }}</h3>
                            <p>{{ Str::upper($home_about->year_bottom_title) }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="about_title">
                            <h1>{!! $home_about->title !!} </h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_text">
                            <p>{{ $home_about->description }}</p>
                            <a href="{{ route('frontend.about') }}" class="custom_btn">Read More <i
                                    class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- about part end -->

    <!-- counter part  -->
    @if ($masterSectionSettings['counter'] === 1)
        <section id="counter_part" class="section_bg_style wow fadeInUp"
            style="background: url({{ asset('frontend/images/slider-2.jpg') }})">
            <div class="container">
                <div class="row">
                    @foreach ($counters as $counter)
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter_item">
                                <div class="counter_icon">
                                    <i class="{{ $counter->icon }}"></i>
                                </div>
                                <div class="counter_text">
                                    <h2><span class="counter">{{ $counter->number }}</span>+</h2>
                                    <h3>{{ $counter->title }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- counter part end -->


    <!-- Company -->
    @if ($masterSectionSettings['company'] === 1)
        <section id="company" class="wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading ">
                            <h2>{!! $themeOption->company_section_title !!}</h2>
                            <p>{{ $themeOption->company_section_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($companies as $company)
                        <div class="col-lg-4 col-md-6">
                            <div class="company_itme">
                                <img src="{{ asset('storage/company/' . $company->icon) }}" alt="{{ $company->title }}">
                                <h3>{{ Str::upper($company->title) }}</h3>
                                <p>{{ $company->description }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- Company end -->

    <!-- mession and vission -->
    @if ($masterSectionSettings['homeMission'] === 1)
        <section id="mission_vission" class="wow fadeInUp">
            <div class="container">
                <div class="row align-items-center mission_vission_row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="vission_left_img">
                            <img src="{{ asset('storage/mission/' . $homeMission->image) }}"
                                alt="{{ $homeMission->block_one_title . $homeMission->block_two_title . $homeMission->block_three_title }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mission">
                            <div class="vission_icon">
                                <i class="{{ $homeMission->block_one_icon }}"></i>
                            </div>
                            <div class="vission_text">
                                <h3>{{ $homeMission->block_one_title }}</h3>
                                <p>{{ $homeMission->block_one_description }}</p>
                            </div>
                        </div>
                        <div class="mission">
                            <div class="vission_icon">
                                <i class=" {{ $homeMission->block_two_icon }}"></i>
                            </div>
                            <div class="vission_text">
                                <h3>{{ $homeMission->block_two_title }}</h3>
                                <p>{{ $homeMission->block_two_description }}</p>
                            </div>
                        </div>
                        <div class="mission">
                            <div class="vission_icon">
                                <i class="{{ $homeMission->block_three_icon }}"></i>
                            </div>
                            <div class="vission_text">
                                <h3> {{ $homeMission->block_three_title }}</h3>
                                <p>{{ $homeMission->block_three_description }}</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    @endif
    <!-- mession and vission end -->

    <!-- Sustainability Practices -->
    @if ($masterSectionSettings['homeSustainability'] === 1)
        <section id="sustainability" class="wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading">
                            <h2>{!! $themeOption->sustainability_section_title !!}</h2>
                            <p>{{ $themeOption->sustainability_section_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 sustainability_left d-none d-lg-block">
                        <img src="{{ asset('storage/sustainability/' . $sustainability->image) }}" class="w-100"
                            alt="{{ $sustainability->title }}">
                    </div>
                    <div class="col-lg-6 ">
                        <div class="sustainability_right">
                            {!! $sustainability->description !!}
                            <a href="{{ route('frontend.sustainability') }}" class="custom_btn">Read More <i
                                    class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Sustainability Practices end -->

    <!-- Our value -->
    @if ($masterSectionSettings['values'] === 1)
        <section id="values_home" class="wow fadeInUp">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_heading text-center">
                            <h2>{!! $themeOption->value_section_title !!}</h2>
                            <p>{{ $themeOption->value_section_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    @foreach ($values as $value)
                        <div class="col-lg col-sm-6">
                            <div class="values_item">
                                <img src="{{ asset('storage/value/' . $value->banner) }}" alt="{{ $value->title }}">
                                <h3>{{ $value->title }}</h3>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- Our value end -->

    {{-- employee --}}
    @if ($masterSectionSettings['employees'] === 1)
        <section class="wow fadeInUp pt-5">
            <div class="container">
                <div class="row align-items-center mission_vission_row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="vission_left_img">
                            <img src="{{ asset('storage/employee/' . $employee->image) }}" alt="{{ $employee->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mission">
                            <div class="vission_text">
                                <h3>{{ $employee->title }}</h3>
                                {!! $employee->description !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    @endif
@endsection
