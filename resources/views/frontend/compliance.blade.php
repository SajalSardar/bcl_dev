@extends('layouts.frontendapp')
@section('title', 'Contact')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('storage/uploads/' . $page_banner->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>Compliance</h2>
                        <nav
                            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                            <ol class="breadcrumb justify-content-center mt-3">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Compliance</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumbs end -->
    <!-- contact part start  -->
    <main id="contact">
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>SEDEX APPROVED</h2>
                    </div>

                </div>
            </div>
        </section>
        <section class="contact"
            style="background: url({{ asset('frontend/images/approve_bg.jpg') }});background-size:cover">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12 text-center my-5 py-5">
                        <h5>We are proudly Sedex approved.</h5>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <!-- contact part end  -->

@endsection
