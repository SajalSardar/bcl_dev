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

        <form action="{{ route('dashboard.contact.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Address</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="address_title"
                                    class="form-control mb-2 @error('address_title') is-invalid @enderror"
                                    placeholder="Title" value="{{ $contact->address_title }}">
                                @error('address_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="address_icon"
                                    class="form-control mb-2 @error('address_icon') is-invalid @enderror" placeholder="Icon"
                                    value="{{ $contact->address_icon }}">
                                @error('address_icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Address: <sup class="text-danger">*</sup></label>
                                <textarea name="address" class="form-control mb-2 @error('address') is-invalid @enderror" rows="4">{{ $contact->address }}</textarea>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                                <input type="text" name="email_title"
                                    class="form-control mb-2 @error('email_title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $contact->email_title }}">
                                @error('email_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="email_icon"
                                    class="form-control mb-2 @error('email_icon') is-invalid @enderror" placeholder="Icon"
                                    value="{{ $contact->email_icon }}">
                                @error('email_icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Email: <sup class="text-danger">*</sup></label>
                                <textarea name="email" class="form-control mb-2 @error('email') is-invalid @enderror" rows="4">{{ $contact->email }}</textarea>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                                <input type="text" name="call_title"
                                    class="form-control mb-2 @error('call_title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $contact->call_title }}">
                                @error('call_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="call_icon"
                                    class="form-control mb-2 @error('call_icon') is-invalid @enderror" placeholder="Icon"
                                    value="{{ $contact->call_icon }}">
                                @error('call_icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Phone: <sup class="text-danger">*</sup></label>
                                <textarea name="number" class="form-control mb-2 @error('number') is-invalid @enderror" rows="4">{{ $contact->number }}</textarea>
                                @error('number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                                <input type="text" name="map_location"
                                    class="form-control mb-2  @error('map_location') is-invalid @enderror"
                                    placeholder="Google Map Location" value="{{ $contact->map }}">
                                @error('map_location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class=" btn btn-md btn-primary" value="Update">
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
