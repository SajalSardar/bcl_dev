@extends('layouts.backend')
@section('title', 'About')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
                <h1 class="m-0">About</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3> About Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.about.update', $about->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $about->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="" class="form-label">Description: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="description" class="form-control mb-2 @error('description') is-invalid @enderror" rows="8"
                                    placeholder="description">{{ $about->description }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Image: <sup class="text-danger">*</sup></label>
                                <input type="file" id="file_input" name="image"
                                    class="form-control mb-2 @error('image') is-invalid @enderror">
                                <p style="color: rgba(54, 76, 102, 0.7)">Select Image 500x500 !</p>
                                @error('image')
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                                <div class="mt-2">
                                    <img id="show_img" src="{{ asset('storage/uploads/' . $about->image) }}" width="60"
                                        alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class=" btn btn-md btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3> About Page Banner</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.about.page.header.update', $page_header->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="" class="form-label">Image: <sup class="text-danger">*</sup></label>
                                <input type="file" id="page_file_input" name="header_banner"
                                    class="form-control mb-2 @error('header_banner') is-invalid @enderror">
                                <p style="color: rgba(54, 76, 102, 0.7)">Select Image size upto 1700x700px !</p>
                                @error('header_banner')
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                                <div class="mt-2">
                                    <img id="page_show_img" src="{{ asset('storage/uploads/' . $page_header->banner) }}"
                                        width="150" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class=" btn btn-md btn-primary" value="Update">
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
        //image change
        let imgf = document.getElementById("file_input");
        let output = document.getElementById("show_img");

        imgf.addEventListener("change", function(event) {
            let tmppath = URL.createObjectURL(event.target.files[0]);
            output.src = tmppath;
        });


        //page banner change
        let head_imgf = document.getElementById("page_file_input");
        let head_output = document.getElementById("page_show_img");

        head_imgf.addEventListener("change", function(event) {
            let tmppath = URL.createObjectURL(event.target.files[0]);
            head_output.src = tmppath;
        });
    </script>
@endsection
