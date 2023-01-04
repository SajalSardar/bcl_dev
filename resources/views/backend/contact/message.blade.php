@extends('layouts.backend')
@section('title', 'Contact Message')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Message</li>
                    </ol>
                </nav>
                <h1 class="m-0">Contact Message</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Message</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr class="table-dark">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($messages as $message)
                                <tr class="{{ $message->status == 1 ? 'font-weight-bold' : '' }}">
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ Str::limit($message->message, 150, '...') }}</td>
                                    <td>{{ $message->created_at->diffForHumans() }}</td>

                                    <td>
                                        <a href="{{ route('dashboard.contact.message.show', $message->id) }}"
                                            class="btn btn-sm btn-primary">View</a>
                                        <form action="{{ route('dashboard.contact.message.destroy', $message->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger delete_btn">Delete</button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $messages->links() }}
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
