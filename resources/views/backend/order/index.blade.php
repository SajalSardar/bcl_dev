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
        <form action="{{ route('dashboard.order.index') }}" method="GET">
            <div class="row mb-3">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" name="art_po_no" placeholder="Art# & PO#">
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
                        <div class="btn-group nav nav-tabs mb-3" id="orderTab">
                            <a class="btn btn-primary active" data-toggle="tab" href="#activeOrder">Active
                                Order</a>
                            <a class="btn btn-primary" data-toggle="tab" href="#deactive">Deactive
                                Order</a>
                            <a class="btn btn-primary" data-toggle="tab" href="#comOrder">Compleated
                                Order</a>
                            <a class="btn btn-primary" data-toggle="tab" href="#trash">Trash</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="activeOrder">
                                <table class="table mt-2">
                                    <tr>
                                        <th>Id</th>
                                        <th>Art# & PO#</th>
                                        <th>Quantity</th>
                                        <th>Client</th>
                                        <th>Client Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>

                                            <td>{{ $order->art_po }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>
                                                <span class="badge badge-success">Running</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.order.show', $order->id) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('dashboard.order.edit', $order->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('dashboard.order.delete', $order->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger delete_btn">Trash</button>

                                                </form>
                                                <a href="{{ route('dashboard.order.status.update', $order->id) }}"
                                                    class="btn btn-sm btn-warning">Deactive</a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </table>

                                <div class="mt-2 border-top pt-2">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="deactive">
                                <table class="table mt-2">
                                    <tr>
                                        <th>Id</th>
                                        <th>Art# & PO#</th>
                                        <th>Quantity</th>
                                        <th>Client</th>
                                        <th>Client Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($deactive_orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>

                                            <td>{{ $order->art_po }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>
                                                <span class="badge badge-warning">Deactive</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.order.show', $order->id) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('dashboard.order.edit', $order->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('dashboard.order.delete', $order->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger delete_btn">Trash</button>

                                                </form>
                                                <a href="{{ route('dashboard.order.status.update', $order->id) }}"
                                                    class="btn btn-sm btn-success">Active</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>

                                <div class="mt-2 border-top pt-2">
                                    {{ $deactive_orders->links() }}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comOrder">
                                <table class="table mt-2">
                                    <tr>
                                        <th>Id</th>
                                        <th>Art# & PO#</th>
                                        <th>Quantity</th>
                                        <th>Client</th>
                                        <th>Client Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($compleated_orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>

                                            <td>{{ $order->art_po }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>
                                                <span class="badge badge-success">Done</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.order.show', $order->id) }}"
                                                    class="btn btn-sm btn-info">View</a>


                                            </td>
                                        </tr>
                                    @endforeach

                                </table>

                                <div class="mt-2 border-top pt-2">
                                    {{ $compleated_orders->links() }}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="trash">
                                <table class="table mt-2">
                                    <tr>
                                        <th>Id</th>
                                        <th>Art# & PO#</th>
                                        <th>Quantity</th>
                                        <th>Client</th>
                                        <th>Client Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($trash_orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>

                                            <td>{{ $order->art_po }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>
                                                <span class="badge badge-warning">Deactive</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.order.restore', $order->id) }}"
                                                    class="btn btn-sm btn-success">Restore</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>

                                <div class="mt-2 border-top pt-2">
                                    {{ $trash_orders->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        //tab change
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#orderTab a[href="' + activeTab + '"]').tab('show');
        }
    </script>
@endsection
