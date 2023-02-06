@extends('layouts.backend')
@section('title', 'Users')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Users</li>
                    </ol>
                </nav>
                <h1 class="m-0">All Users</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <form action="{{ route('dashboard.user.index') }}" method="GET">
            <div class="row mb-3">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" value="{{ request()->get('search_string') }}"
                            name="search_string" placeholder="Name Or Email">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3> All Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                            </tr>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $users->links() }}
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
