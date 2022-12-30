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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ Str::limit($slider->title, 20, '...') }}</td>
                                    <td>
                                        @if ($slider->slide_type == 'video')
                                            <video height="80" controls>
                                                <source src="{{ asset('storage/slide/' . $slider->slide) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{ asset('storage/slide/' . $slider->slide) }}"
                                                alt="{{ $slider->title }}" height="80">
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $slider->status == 1 ? 'badge-success' : 'badge-warning' }}">{{ $slider->status == 1 ? 'Active' : 'Deactive' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.slider.edit', $slider->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('dashboard.slider.destroy', $slider->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete_btn">Delete</button>

                                        </form>
                                        <a
                                            href="{{ route('dashboard.slider.status.update', $slider->id) }}"class="btn btn-sm {{ $slider->status == 1 ? 'bg-warning' : 'bg-info' }}">{{ $slider->status == 1 ? 'Deactive' : 'Active' }}</a>
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
                        <form action="{{ route('dashboard.slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Title:<sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description:</label>
                                <textarea name="description" class="form-control mb-2 @error('description') is-invalid @enderror" rows="5"
                                    placeholder="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror


                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Banner Image: <sup
                                        class="text-danger">*</sup></label>
                                <input type="file" name="slide"
                                    class="form-control mb-2 @error('slide') is-invalid @enderror">
                                <p style="color: rgba(54, 76, 102, 0.7)">Select Image 1920x800 Or Video File!</p>
                                @error('slide')
                                    <p class="text-danger">{{ $message }} </p>
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
