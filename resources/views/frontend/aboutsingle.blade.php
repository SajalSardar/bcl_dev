@extends('layouts.frontendapp')
@section('title')
    {{ $missionVission->title }}
@endsection
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('storage/about_page_block/' . $missionVission->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>{{ $missionVission->title }}</h2>
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
                        <h3 class="mb-3">{{ $missionVission->title }}</h3>
                        {!! $missionVission->description !!}
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- about main part end -->
@endsection
