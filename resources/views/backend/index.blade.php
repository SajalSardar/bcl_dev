@extends('layouts.backend')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        @if (auth()->user()->role === 'admin')
            <div class="row card-group-row">
                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Total Orders</div>
                                <div class="text-amount">{{ count($orders) }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.index') }}" class="mb-2">View</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Active Orders</div>
                                <div class="text-amount">{{ $orders->where('status', 1)->count() }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.index') }}" class="mb-2">View</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Compleated Orders</div>
                                <div class="text-amount">{{ $orders->where('status', 3)->count() }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.index') }}" class="mb-2">View</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Deactive Orders</div>
                                <div class="text-amount">{{ $orders->where('status', 2)->count() }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.index') }}" class="mb-2">View</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif

        @if (auth()->user()->role === 'client')
            <div class="row card-group-row">
                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Total Orders</div>
                                <div class="text-amount">{{ count($client_orders) }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.client') }}" class="mb-2">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Active Orders</div>
                                <div class="text-amount">{{ $client_orders->where('status', 1)->count() }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.client') }}" class="mb-2">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Compleated Orders</div>
                                <div class="text-amount">{{ $client_orders->where('status', 3)->count() }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.client') }}" class="mb-2">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="flex">
                                <div class="card-header__title mb-2">Deactive Orders</div>
                                <div class="text-amount">{{ $client_orders->where('status', 2)->count() }}</div>
                            </div>
                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                <a href="{{ route('dashboard.order.client') }}" class="mb-2">View</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif


    </div>
@endsection
