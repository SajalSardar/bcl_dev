@extends('layouts.backend')
@section('title', 'Product Edit')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
                    </ol>
                </nav>
                <h1 class="m-0">Product Edit</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $product->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="" class="form-label">Category: <sup class="text-danger">*</sup></label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->product_category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="" class="form-label">Description: </label>
                                <textarea name="description" class="form-control mb-2 @error('description') is-invalid @enderror" rows="8"
                                    placeholder="description">{{ $product->description }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Image: <sup class="text-danger">*</sup></label>
                                <input type="file" name="image" id="file_input"
                                    class="form-control mb-2 @error('image') is-invalid @enderror">
                                <p style="color: rgba(54, 76, 102, 0.7)">Selected Image Size 800x1000!</p>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    <img id="show_img" src="{{ asset('storage/product/' . $product->image) }}"
                                        width="100" alt="">
                                </div>
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
        //image change
        let imgf = document.getElementById("file_input");
        let output = document.getElementById("show_img");

        imgf.addEventListener("change", function(event) {
            let tmppath = URL.createObjectURL(event.target.files[0]);
            output.src = tmppath;
        });
    </script>

@endsection
