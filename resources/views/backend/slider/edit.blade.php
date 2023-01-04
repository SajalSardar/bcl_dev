@extends('layouts.backend')
@section('title', 'Slider Edit')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Slider Edit</li>
                    </ol>
                </nav>
                <h1 class="m-0">Slider Edit</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Select Slide</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('dashboard.slider.update', $slider->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="" class="form-label">Title:<sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $slider->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description:</label>
                                <textarea name="description" class="form-control mb-2 @error('description') is-invalid @enderror" rows="5"
                                    placeholder="description">{{ $slider->description }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror


                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Upload New Image or Video:</label>
                                <input type="file" name="slide"
                                    class="form-control mb-2 @error('slide') is-invalid @enderror">
                                <p style="color: rgba(54, 76, 102, 0.7)">Select Image 1700x700 Or Video File!</p>
                                @error('slide')
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-md btn-primary" value="Update">
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
                        $('.delete_btn').parent('form').submit();
                    }
                });
            });
        });
    </script>

@endsection
