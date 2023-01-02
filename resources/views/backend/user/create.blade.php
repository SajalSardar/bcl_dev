@extends('layouts.backend')
@section('title', 'Create New User')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New User</li>
                    </ol>
                </nav>
                <h1 class="m-0">Create New User</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Create New User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Name: <sup class="text-danger">*</sup></label>
                                <input type="text" name="name"
                                    class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="Name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Email: <sup class="text-danger">*</sup></label>
                                <input type="text" name="email"
                                    class="form-control mb-2  @error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Password: <sup class="text-danger">*</sup></label>
                                <input type="password" name="password"
                                    class="form-control mb-2  @error('password') is-invalid @enderror"
                                    placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Confirm Password: <sup
                                        class="text-danger">*</sup></label>
                                <input type="password" name="password_confirmation"
                                    class="form-control mb-2  @error('password') is-invalid @enderror"
                                    placeholder="Confirm Password" value="{{ old('password') }}">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Role: <sup class="text-danger">*</sup></label>
                                <select name="role" class="form-control mb-2  @error('role') is-invalid @enderror">
                                    <option selected disabled>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="client">Client</option>
                                </select>
                                @error('role')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
