@extends('layouts.frontendapp')
@section('title', 'Profile')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('storage/uploads/' . $page_banner->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>Profile</h2>
                        <nav
                            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                            <ol class="breadcrumb justify-content-center mt-3">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumbs end -->
    <!-- profile page  -->
    <section id="profile_page" class="wow fadeInUp">
        <div class="container">
            <div class="row align-items-center mission_vission_row">

                <div class="col-md-12">
                    <div class="about_page">
                        <h3>
                            {{ $profile->title }}
                            <a href="{{ route('frontend.profile.download') }}" class="custom_btn">Download
                                Profile</a>
                        </h3>
                        <img src="{{ asset('storage/uploads/' . $profile->image) }}" width="400" alt="">
                        {!! $profile->description !!}
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- profile page end -->
@endsection
