@extends('layouts.backend')
@section('title', 'Section Settings')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Section Settings</li>
                    </ol>
                </nav>
                <h1 class="m-0">Section Settings</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Section Settings</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.setting.section.update') }}" method="POST">
                            @csrf
                            <table class="table">
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ Str::ucfirst($section->section) }}</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" name="section[]" value="{{ $section->id }}"
                                                    {{ $section->status == 1 ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
