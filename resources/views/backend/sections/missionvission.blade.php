@extends('layouts.backend')
@section('title', 'Home Mission')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home Mission</li>
                    </ol>
                </nav>
                <h1 class="m-0">Home Mission Section</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <form action="{{ route('dashboard.company.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Block One</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="title_one" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title_one') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="icon_one" class="form-control mb-2" placeholder="Icon"
                                    value="{{ old('icon') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Description:</label>
                                <textarea name="description_one" class="form-control mb-2" rows="4">{{ old('description_one') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Block Two</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="title_two" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title_two') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="icon_two" class="form-control mb-2" placeholder="Icon"
                                    value="{{ old('icon_two') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Description:</label>
                                <textarea name="description_two" class="form-control mb-2" rows="4">{{ old('description_two') }}</textarea>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Block Three</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="title_three" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('title_three') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="icon_three" class="form-control mb-2" placeholder="Icon"
                                    value="{{ old('icon_three') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Description:</label>
                                <textarea name="description_three" class="form-control mb-2" rows="4">{{ old('description_three') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Image</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" name="image" class="form-control mb-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class=" btn btn-md btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
