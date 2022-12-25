@extends('layouts.backend')
@section('title', 'Sustainability')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sustainability</li>
                    </ol>
                </nav>
                <h1 class="m-0">Sustainability</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Sustainability</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.sustainability.store') }}" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group ">
                                <textarea name="description" class="form-control mb-2" rows="8" placeholder="description">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-md btn-primary" value="Submit">
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


        </div>
    </div>
@endsection
