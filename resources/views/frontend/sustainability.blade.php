@extends('layouts.frontendapp')
@section('title', 'Sustainability')
@section('content')
    <!-- breadcrumbs -->
    <section id="breadcrumbs" style="background: url({{ asset('frontend/images/slider-2.jpg') }})">
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
            <div class="row align-items-center">
                <div class="col-lg-6 sustainability_left d-none d-lg-block">
                    <img src="{{ asset('frontend/images/sustain.jpg') }}" class="w-100" alt="">
                </div>
                <div class="col-lg-6 ">
                    <div class="sustainability_right">
                        <h3 class="pb-4">The Key to a Bright Future for Bangladehi Sustainability</h3>
                        <p>As a Manufacturing Unit, we are committed to advancing sustainability's critical role in ensuring
                            a
                            promising future in business, society, and the environment. We do this by using:</p>
                        <ul>
                            <li><i class="fa-regular fa-share-from-square"></i> Our people: Developing their skills through
                                education
                                and
                                professional development Innovation
                                and technology: Purchasing the newest computer-aided manufacturing equipment commitment
                                to high standards of quality control</li>
                            <li><i class="fa-regular fa-share-from-square"></i> Service: Providing the best client care
                                possible and
                                ensuring supply chain accountability</li>
                            <li> <i class="fa-regular fa-share-from-square"></i>Implementing a three-year plan to cut back
                                on gas,
                                water, and effluent wastage.</li>
                        </ul>
                        <p>The Barison Creation Ltd. is fully devoted to its duty to promote the sustainability of its
                            operations,
                            of
                            its clientele, of its stakeholders, and of the local and natural environments.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-5 pt-5">
                <div class="col-lg-6 ">
                    <div class="sustainability_right">
                        <h3 class="pb-4">Ecological Controls</h3>
                        <p>The Barison Creation Ltd is dedicated to upholding the highest levels of ecologically protective
                            practices, as are
                            its Board of Management, divisions, operations, and staff. Protecting the environment is a
                            fundamental
                            part of our sustainability approach. We are aware of our enormous obligation to produce in a
                            morally
                            responsible manner while taking special care to protect the environment for future generations.
                        </p>
                        <p>The group has implemented a rigorous three-year plan designed to further advance our
                            environmental
                            efforts. This strategy is centered on 4 primary goals:</p>

                        <p>The introduction of highly efficient industrial equipment intended to reduce water consumption
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 sustainability_left d-none d-lg-block">
                    <img src="{{ asset('frontend/images/sustain.jpg') }}" class="w-100" alt="">
                </div>
            </div>
            <div class="row align-items-center mt-5 pt-5">
                <div class="col-lg-6 sustainability_left d-none d-lg-block">
                    <img src="{{ asset('frontend/images/sustain.jpg') }}" class="w-100" alt="">
                </div>
                <div class="col-lg-6 ">
                    <div class="sustainability_right">
                        <h3 class="pb-4">Ecological Regulations </h3>
                        <p>The incorporation of 1.5 cusec-capable wastewater treatment facilities created in accordance with
                            World Bank recommendations</p>

                        <p>Introducing high-efficiency production equipment with the goal of halving water usage the use of
                            combined
                            heat and power generation with a 10% reduction in gas usage as the objective the adoption of
                            cutting-edge
                            dyeing techniques to further reduce waste and pollution levels.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
