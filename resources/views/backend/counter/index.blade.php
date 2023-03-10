@extends('layouts.backend')
@section('title', 'Counter')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Counter</li>
                    </ol>
                </nav>
                <h1 class="m-0">Counter</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>All Counter</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Icon Name</th>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($counters as $counter)
                                <tr>
                                    <td>{{ $counter->id }}</td>
                                    <td>{{ $counter->title }}</td>
                                    <td>{{ $counter->icon }}</td>
                                    <td>{{ $counter->number }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $counter->status == 1 ? 'badge-success' : 'badge-warning' }}">{{ $counter->status == 1 ? 'Active' : 'Deactive' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.counter.edit', $counter->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('dashboard.counter.destroy', $counter->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete_btn">Delete</button>

                                        </form>
                                        <a
                                            href="{{ route('dashboard.counter.status', $counter->id) }}"class="btn btn-sm {{ $counter->status == 1 ? 'bg-warning' : 'bg-info' }}">{{ $counter->status == 1 ? 'Deactive' : 'Active' }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Counter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.counter.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Title: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Counter Number: <sup
                                        class="text-danger">*</sup></label>
                                <input type="number" name="number" placeholder="Number"
                                    class="form-control mb-2 @error('number') is-invalid @enderror"
                                    value="{{ old('number') }}">
                                @error('number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Counter Icon: <sup
                                        class="text-danger">*</sup></label>
                                <input type="text" name="icon" placeholder="Ex: fa-solid fa-people-roof"
                                    class="form-control mb-2 @error('icon') is-invalid @enderror"
                                    value="{{ old('icon') }}">
                                <p style="color: rgba(54, 76, 102, 0.7)">Select <a
                                        href="https://fontawesome.com/search">Fontawesome Icon</a> !</p>
                                @error('icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-md btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')

    <script>
        $(function($) {
            $('.delete_btn').on('click', function() {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('form').submit();
                    }
                });
            });
        });
    </script>

@endsection
