@extends('layouts.backend')
@section('title', 'Gallery')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
                <h1 class="m-0">Gallery</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>All Sustainability</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Gallery</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.gallery.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <input type="file" name="image[]" class="form-control mb-2" multiple>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-md btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
