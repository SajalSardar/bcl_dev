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
                        <h3>All Message <a href="{{ route('dashboard.contact.message') }}"
                                class="btn btn-sm btn-primary">Back</a></h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td width='15%'><strong>Name</strong></td>
                                <td width='5%'>:</td>
                                <td>{{ $message->name }}</td>
                            </tr>
                            <tr>
                                <td width='15%'><strong>Email</strong></td>
                                <td width='5%'>:</td>
                                <td>{{ $message->email }}</td>
                            </tr>
                            <tr>
                                <td width='15%'><strong>Subject</strong></td>
                                <td width='5%'>:</td>
                                <td>{{ $message->subject }}</td>
                            </tr>
                            <tr>
                                <td width='15%'><strong>Message</strong></td>
                                <td width='5%'>:</td>
                                <td>{{ $message->message }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
