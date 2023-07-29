@extends('layouts.frontendapp')
@section('title', 'About')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('storage/uploads/' . $page_banner->banner) }});">
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
                        <h3>{{ $about->title }}</h3>
                        <img src="{{ asset('storage/uploads/' . $about->image) }}" width="400" alt="{{ $about->title }}">
                        {!! $about->description !!}
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- about main part end -->

    @if ($masterSectionSettings['aboutBlock'] === 1)
        <section id="about_page_block_main" class="wow fadeInUp">
            <div class="container">
                <div class="row align-items-center">
                    @foreach ($missionVission as $missionVission)
                        <div class="col-md-6">
                            <div class="about_page_block_part">
                                <img src="{{ asset('storage/about_page_block/' . $missionVission->image) }}"
                                    alt="{{ $missionVission->title }}">
                                <div class="block_content">
                                    <h3>{{ $missionVission->title }}</h3>
                                    <p>{!! Str::limit($missionVission->description, 200, '...') !!}</p>
                                    <a href="{{ route('frontend.about.block.single', $missionVission->slug) }}"
                                        class="custom_btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    @endif
@endsection
