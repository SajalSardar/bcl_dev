@extends('layouts.backend')
@section('title', 'Order')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order</li>
                    </ol>
                </nav>
                <h1 class="m-0">Order</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <form action="{{ route('dashboard.order.client') }}" method="GET">
            <div class="row mb-3">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" value="{{ request()->get('art_po_no') }}"
                            name="art_po_no" placeholder="Art# & PO#">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Orders</h2>
                    </div>
                    <div class="card-body">
                        <table class="table mt-2">
                            <tr>
                                <th>Id</th>
                                <th>Art# & PO#</th>
                                <th>Quantity</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>

                                    <td>{{ $order->art_po }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>
                                        @if ($order->deleted_at)
                                            <span class="badge badge-danger">
                                                Trashed
                                            </span>
                                        @else
                                            <span
                                                class="badge {{ $order->status == 1 ? 'badge-info' : ($order->status == 2 ? 'badge-warning' : 'badge-success') }} ">
                                                {{ $order->status == 1 ? 'Running' : ($order->status == 2 ? 'Deactive' : 'Compleated') }}
                                            </span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($order->deleted_at === null)
                                            <a href="{{ route('dashboard.order.show', $order->id) }}"
                                                class="btn btn-sm btn-primary">View</a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-success">No Order Found!</div>
                                    </td>
                                </tr>
                            @endforelse

                        </table>

                        <div class="mt-2 border-top pt-2">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
