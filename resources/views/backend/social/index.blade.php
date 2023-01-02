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
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($socials as $social)
                                <tr>
                                    <td>{{ $social->id }}</td>
                                    <td>{{ $social->title }}</td>
                                    <td><i class="fab {{ $social->icon }}"></i></td>
                                    <td>
                                        <span
                                            class="badge {{ $social->status == 1 ? 'badge-success' : 'badge-warning' }}">{{ $social->status == 1 ? 'Active' : 'Deactive' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.social-link.edit', $social->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('dashboard.social-link.destroy', $social->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete_btn">Delete</button>

                                        </form>
                                        <a
                                            href="{{ route('dashboard.social.status.update', $social->id) }}"class="btn btn-sm {{ $social->status == 1 ? 'bg-warning' : 'bg-info' }}">{{ $social->status == 1 ? 'Deactive' : 'Active' }}</a>
                                    </td>
                                </tr>
                            @endforeach
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
                        <form action="{{ route('dashboard.social-link.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Title: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2  @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon Name: <sup class="text-danger">*</sup></label>
                                <select name="icon" class="form-control mb-2  @error('icon') is-invalid @enderror">
                                    <option selected disabled>Select Icon Name</option>
                                    <option value="fa-facebook-f">Facebook</option>
                                    <option value="fa-twitter">Twitter</option>
                                    <option value="fa-linkedin-in">Linkedin</option>
                                    <option value="fa-youtube">Youtube</option>
                                </select>
                                @error('icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon Link: <sup class="text-danger">*</sup></label>
                                <input type="text" name="link"
                                    class="form-control mb-2  @error('link') is-invalid @enderror" placeholder="Icon Link"
                                    value="{{ old('link') }}">
                                @error('link')
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

@section('script')

    <script>
        $(function($) {
            $('.delete_btn').on('click', function() {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('form').submit();
                    }
                });
            });
        });
    </script>

@endsection
