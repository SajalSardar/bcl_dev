@extends('layouts.frontendapp')
@section('title', 'Sustainability')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('storage/uploads/' . $page_banner->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>Sustainability</h2>
                        <nav
                            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                            <ol class="breadcrumb justify-content-center mt-3">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sustainability</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumbs end -->

    <section id="sustainability" class="wow fadeInUp">
        <div class="container">
            @foreach ($sustainability as $key => $sustainability)
                @if (++$key % 2 == 0)
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-6 sustainability_left d-none d-lg-block">
                            <img src="{{ asset('storage/sustainability/' . $sustainability->image) }}" class="w-100"
                                alt="{{ $sustainability->title }}">
                        </div>
                        <div class="col-lg-6 ">
                            <div class="sustainability_right">
                                <h3 class="pb-4">{{ $sustainability->title }}</h3>
                                {!! $sustainability->description !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row align-items-center mb-5">
                        <div class="col-lg-6 ">
                            <div class="sustainability_right">
                                <h3 class="pb-4">{{ $sustainability->title }}</h3>
                                {!! $sustainability->description !!}

                            </div>
                        </div>
                        <div class="col-lg-6 sustainability_left d-none d-lg-block">
                            <img src="{{ asset('storage/sustainability/' . $sustainability->image) }}" class="w-100"
                                alt="{{ $sustainability->title }}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
