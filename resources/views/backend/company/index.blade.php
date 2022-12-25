@extends('layouts.backend')
@section('title', 'Our Company')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Company</li>
                    </ol>
                </nav>
                <h1 class="m-0">Our Company</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Counter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.company.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group ">
                                <textarea name="description" class="form-control mb-2" rows="8" placeholder="description">{{ old('description') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="form-lable">Icon Image:</label>
                                    <input type="file" name="icon" class="form-control mb-2">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="form-lable">Banner Image:</label>
                                    <input type="file" name="banner_image" class="form-control mb-2">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class=" btn btn-md btn-primary" value="Submit">
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
                        <h3>All Counter</h3>
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
