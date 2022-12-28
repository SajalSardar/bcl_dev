@extends('layouts.backend')
@section('title', 'Home Mission')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home Mission</li>
                    </ol>
                </nav>
                <h1 class="m-0">Home Mission Section</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <form action="{{ route('dashboard.home-mission.update', $home_mission_area->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Block One</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title_one" class="form-control mb-2" placeholder="Title"
                                    value="{{ $home_mission_area->block_one_title }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="icon_one" class="form-control mb-2" placeholder="Icon"
                                    value="{{ $home_mission_area->block_one_icon }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Description: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="description_one" class="form-control mb-2" rows="4">{{ $home_mission_area->block_one_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Block Two</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title_two" class="form-control mb-2" placeholder="Title"
                                    value="{{ $home_mission_area->block_two_title }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="icon_two" class="form-control mb-2" placeholder="Icon"
                                    value="{{ $home_mission_area->block_two_icon }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Description: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="description_two" class="form-control mb-2" rows="4">{{ $home_mission_area->block_two_description }}</textarea>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Block Three</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="title_three" class="form-control mb-2" placeholder="Title"
                                    value="{{ $home_mission_area->block_three_title }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Icon: <sup class="text-danger">*</sup></label>
                                <input type="text" name="icon_three" class="form-control mb-2" placeholder="Icon"
                                    value="{{ $home_mission_area->block_three_icon }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Description: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="description_three" class="form-control mb-2" rows="4">{{ $home_mission_area->block_three_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Image</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Image: </label>
                                <input type="file" id="file_input" name="image" class="form-control mb-2">
                            </div>
                            <div class="mt-3">
                                <img src="{{ asset('storage/mission/' . $home_mission_area->image) }}" width="100"
                                    alt="" id="show_img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class=" btn btn-md btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </form>

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
