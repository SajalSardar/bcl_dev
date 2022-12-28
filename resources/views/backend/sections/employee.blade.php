@extends('layouts.backend')
@section('title', 'Employee')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
                    </ol>
                </nav>
                <h1 class="m-0">Home Employee Section</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add About</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.employee.update', $employee->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                    value="{{ $employee->title }}">
                            </div>
                            <div class="form-group ">
                                <label for="" class="form-label">Description: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="description" class="form-control mb-2" rows="8" placeholder="description">{{ $employee->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-lable">Image:</label>
                                <input type="file" id="file_input" name="image" class="form-control mb-2">

                                <div class="mt-3">
                                    <img src="{{ asset('storage/employee/' . $employee->image) }}" width="100"
                                        alt="" id="show_img">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class=" btn btn-md btn-primary" value="Submit">
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
    </script>
@endsection
