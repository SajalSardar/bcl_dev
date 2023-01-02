@extends('layouts.backend')
@section('title', 'Edit Company')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $company->title }}</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Company</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Company</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.company.update', $company->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $company->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="" class="form-label">Description: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="description" class="form-control mb-2 @error('description') is-invalid @enderror" rows="8"
                                    placeholder="description">{{ $company->description }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="" class="form-label">Block Icon: <sup
                                            class="text-danger">*</sup></label>
                                    <input type="file" name="icon" id="icon_input"
                                        class="form-control mb-2 @error('icon') is-invalid @enderror">
                                    <p style="color: rgba(54, 76, 102, 0.7)">Select Icon Size 65x65</p>
                                    @error('icon')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/company/' . $company->icon) }}" width="60"
                                            id="icon_img" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="" class="form-label">Banner Image:</label>
                                    <input type="file" name="banner_image" id="file_input"
                                        class="form-control mb-2 @error('banner_image') is-invalid @enderror">
                                    <p style="color: rgba(54, 76, 102, 0.7)">Select Image Size 1000x600</p>
                                    @error('banner_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/company/' . $company->banner) }}" width="100"
                                            id="show_img" alt="">
                                    </div>
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

        //icon change
        let icon_imgf = document.getElementById("icon_input");
        let icon_output = document.getElementById("icon_img");

        icon_imgf.addEventListener("change", function(event) {
            let tmppath = URL.createObjectURL(event.target.files[0]);
            icon_output.src = tmppath;
        });
    </script>
@endsection
