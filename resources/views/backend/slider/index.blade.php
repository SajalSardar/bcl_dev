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
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Select Slide</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.banner.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title') }}">
                                <p style="color: rgba(54, 76, 102, 0.7)">Optional</p>
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control mb-2" rows="5" placeholder="description">{{ old('description') }}</textarea>
                                <p style="color: rgba(54, 76, 102, 0.7)">Optional</p>
                            </div>
                            <div class="form-group">
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
