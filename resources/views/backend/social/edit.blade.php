@extends('layouts.backend')
@section('title', 'Edit Social Link')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Social Link</li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit Social Link</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Social Link</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.social-link.update', $socialLink->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="" class="form-label">Title: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2  @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ $socialLink->title }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon Name: <sup class="text-danger">*</sup></label>
                                <select name="icon" class="form-control mb-2  @error('icon') is-invalid @enderror">
                                    <option value="fa-facebook-f"
                                        {{ Str::lower($socialLink->title) == 'facebook' ? 'selected' : '' }}>
                                        Facebook</option>
                                    <option value="fa-twitter"
                                        {{ Str::lower($socialLink->title) == 'twitter' ? 'selected' : '' }}>Twitter</option>
                                    <option value="fa-linkedin-in"
                                        {{ Str::lower($socialLink->title) == 'linkedin' ? 'selected' : '' }}>Linkedin
                                    </option>
                                    <option value="fa-youtube"
                                        {{ Str::lower($socialLink->title) == 'youtube' ? 'selected' : '' }}>Youtube</option>
                                </select>
                                @error('icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon Link: <sup class="text-danger">*</sup></label>
                                <input type="text" name="link"
                                    class="form-control mb-2  @error('link') is-invalid @enderror" placeholder="Icon Link"
                                    value="{{ $socialLink->link }}">
                                @error('link')
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
