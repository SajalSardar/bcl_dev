@extends('layouts.backend')
@section('title', 'Counter Edit')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Counter Edit</li>
                    </ol>
                </nav>
                <h1 class="m-0">Counter Edit</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Counter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.counter.update', $counter->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="" class="form-label">Title: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $counter->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Counter Number: <sup
                                        class="text-danger">*</sup></label>
                                <input type="number" name="number" placeholder="Number"
                                    class="form-control mb-2 @error('number') is-invalid @enderror"
                                    value="{{ $counter->number }}">
                                @error('number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Counter Icon: <sup
                                        class="text-danger">*</sup></label>
                                <input type="text" name="icon" value="{{ $counter->icon }}"
                                    placeholder="Ex: fa-solid fa-people-roof"
                                    class="form-control mb-2 @error('icon') is-invalid @enderror">
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
