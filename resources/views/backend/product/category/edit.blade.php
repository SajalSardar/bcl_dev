@extends('layouts.backend')
@section('title', 'Product Category Edit')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Category Edit</li>
                    </ol>
                </nav>
                <h1 class="m-0">Product Category Edit</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.product-category.update', $productCategory->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="" class="form-label">Name: <sup class="text-danger">*</sup></label>
                                <input type="text" name="name"
                                    class="form-control mb-2  @error('name') is-invalid @enderror"
                                    placeholder="Category Name" value="{{ $productCategory->name }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
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
