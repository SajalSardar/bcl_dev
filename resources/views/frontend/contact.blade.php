@extends('layouts.frontendapp')
@section('title', 'Contact')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('storage/uploads/' . $page_banner->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner text-center">
                        <h2>Contact Us</h2>
                        <nav
                            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
                            <ol class="breadcrumb justify-content-center mt-3">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
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
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="{{ $contact->address_icon }}"></i>
                                    <h3>{{ $contact->address_title }}</h3>
                                    <p>{{ $contact->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="{{ $contact->email_icon }}"></i>
                                    <h3>{{ $contact->email_title }}</h3>
                                    <p>{!! $contact->email !!}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="{{ $contact->call_icon }}"></i>
                                    <h3>{{ $contact->call_title }}</h3>
                                    <p>{!! $contact->number !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('frontend.contact.store') }}" method="POST" class="php-email-form">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required="">
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required="">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required="">
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="custom_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @if ($masterSectionSettings['gMap'] === 1)
            <section class="map mt-2">
                <div class="container-fluid p-0">
                    <iframe src="{{ $contact->map }}" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </section>
        @endif
    </main>
    <!-- contact part end  -->

@endsection
