@extends('layouts.backend')
@section('title', 'Values')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Values</li>
                    </ol>
                </nav>
                <h1 class="m-0">Values</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>All Values</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($values as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td><img src="{{ asset('storage/value/' . $value->banner) }}" alt=""
                                            width="100"></td>
                                    <td>{{ $value->title }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $value->status == 1 ? 'badge-success' : 'badge-warning' }}">{{ $value->status == 1 ? 'Active' : 'Deactive' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.value.edit', $value->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('dashboard.value.destroy', $value->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete_btn">Delete</button>

                                        </form>
                                        <a
                                            href="{{ route('dashboard.value.status.update', $value->id) }}"class="btn btn-sm {{ $value->status == 1 ? 'bg-warning' : 'bg-info' }}">{{ $value->status == 1 ? 'Deactive' : 'Active' }}</a>
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
                        <h3>Add Counter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.value.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title"
                                    class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Image: <sup class="text-danger">*</sup></label>
                                <input type="file" name="image" id="file_input"
                                    class="form-control mb-2 @error('image') is-invalid @enderror">
                                <p style="color: rgba(54, 76, 102, 0.7)">Selected Image Size 250x250!</p>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="mt-2">
                                    <img src="" id="show_img" alt="" width="100">
                                </div>
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
        //image change
        let imgf = document.getElementById("file_input");
        let output = document.getElementById("show_img");

        imgf.addEventListener("change", function(event) {
            let tmppath = URL.createObjectURL(event.target.files[0]);
            output.src = tmppath;
        });
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
