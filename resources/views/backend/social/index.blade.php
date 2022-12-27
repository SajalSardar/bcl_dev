@extends('layouts.backend')
@section('title', 'Social Link')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Social Link</li>
                    </ol>
                </nav>
                <h1 class="m-0">Social Link</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>All Social Link</h3>
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
                        <h3>Social Link</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.banner.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="" class="form-label">Title: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon Name: <sup class="text-danger">*</sup></label>
                                <select name="icon" class="form-control mb-2">
                                    <option value="fa-facebook">Facebook</option>
                                    <option value="fa-twitter">Twitter</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon Link: <sup class="text-danger">*</sup></label>
                                <input type="text" name="link" class="form-control mb-2" placeholder="Icon Link"
                                    value="{{ old('link') }}">
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
