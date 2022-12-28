@extends('layouts.backend')
@section('title', 'Slider')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Slider</li>
                    </ol>
                </nav>
                <h1 class="m-0">Slider</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>All Slide</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ Str::limit($slider->title, 20, '...') }}</td>
                                    <td>
                                        @if ($slider->slide_type == 'video')
                                            <video autoplay="" loop="" height="80">
                                                <source src="{{ asset('storage/slide/' . $slider->slide) }}"
                                                    type="video/mp4">
                                            </video>
                                        @else
                                            <img src="{{ asset('storage/slide/' . $slider->slide) }}"
                                                alt="{{ $slider->title }}" height="80">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Select Slide</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('dashboard.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Title:<sup class="text-danger">*</sup></label>
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description:</label>
                                <textarea name="description" class="form-control mb-2" rows="5" placeholder="description">{{ old('description') }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Banner Image: <sup
                                        class="text-danger">*</sup></label>
                                <input type="file" name="slide" class="form-control mb-2">
                                <p style="color: rgba(54, 76, 102, 0.7)">Select Image Or Video File!</p>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-md btn-primary" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
