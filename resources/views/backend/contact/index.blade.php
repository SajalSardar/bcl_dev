@extends('layouts.backend')
@section('title', 'Contact')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
                <h1 class="m-0">Contact Page</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <form action="{{ route('dashboard.company.store') }}" method="POST">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Address</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="address_title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('address_title') }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="address_icon" class="form-control mb-2" placeholder="Icon"
                                    value="{{ old('address_icon') }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Address: <sup class="text-danger">*</sup></label>
                                <textarea name="address" class="form-control mb-2" rows="4">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Email</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="email_title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('email_title') }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="email_icon" class="form-control mb-2" placeholder="Icon"
                                    value="{{ old('email_icon') }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Email: <sup class="text-danger">*</sup></label>
                                <textarea name="email" class="form-control mb-2" rows="4">{{ old('email') }}</textarea>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Call</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="call_title" class="form-control mb-2" placeholder="Title"
                                    value="{{ old('call_title') }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="call_icon" class="form-control mb-2" placeholder="Icon"
                                    value="{{ old('call_icon') }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Phone: <sup class="text-danger">*</sup></label>
                                <textarea name="number" class="form-control mb-2" rows="4">{{ old('number') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Map</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Google Map Location: </label>
                                <input type="text" name="map_location" class="form-control mb-2"
                                    placeholder="Google Map Location" value="{{ old('map_location') }}">
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
