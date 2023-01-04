@extends('layouts.backend')
@section('title', 'Theme Options')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Options</li>
                    </ol>
                </nav>
                <h1 class="m-0">Options</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <form action="{{ route('dashboard.setting.theme.option.Update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Header</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Header Number: <sup
                                        class="text-danger">*</sup></label>
                                <input type="text" name="header_number"
                                    class="form-control mb-2 @error('header_number') is-invalid @enderror"
                                    placeholder="Number" value="{{ $themeOption->header_number }}">
                                @error('header_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Logo: </label>
                                <input type="file" id="file_input" name="logo"
                                    class="form-control mb-2 @error('logo') is-invalid @enderror">
                                <p style="color: rgba(54, 76, 102, 0.7)">Select Image size 300x110 !</p>
                                @error('logo')
                                    <p class="text-danger">{{ $message }} </p>
                                @enderror
                                <div class="mt-2">
                                    <img id="show_img" src="{{ asset('storage/uploads/' . $themeOption->logo) }}"
                                        width="150" alt="">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class=" btn btn-md btn-primary" value="Update">
                    </div>
                </div>
            </div>
            <hr>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Home Page Section Header</h3>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Company Section Title: <sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" name="company_section_title"
                                        class="form-control mb-2 @error('company_section_title') is-invalid @enderror"
                                        placeholder="Company Section Title"
                                        value="{{ $themeOption->company_section_title }}">
                                    @error('company_section_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Company Section Description: <sup
                                            class="text-danger">*</sup></label>
                                    <textarea name="company_section_description"
                                        class="form-control mb-2 @error('company_section_description') is-invalid @enderror" rows="6">{{ $themeOption->company_section_description }}</textarea>
                                    @error('company_section_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Sustainability Section Title: <sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" name="sustainability_section_title"
                                        class="form-control mb-2 @error('sustainability_section_title') is-invalid @enderror"
                                        placeholder="Company Section Title"
                                        value="{{ $themeOption->sustainability_section_title }}">
                                    @error('sustainability_section_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Sustainability Section Description: <sup
                                            class="text-danger">*</sup></label>
                                    <textarea name="sustainability_section_description"
                                        class="form-control mb-2 @error('sustainability_section_description') is-invalid @enderror" rows="6">{{ $themeOption->sustainability_section_description }}</textarea>
                                    @error('sustainability_section_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Value Section Title: <sup
                                            class="text-danger">*</sup></label>
                                    <input type="text" name="value_section_title"
                                        class="form-control mb-2 @error('value_section_title') is-invalid @enderror"
                                        placeholder="Company Section Title"
                                        value="{{ $themeOption->value_section_title }}">
                                    @error('value_section_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Value Section Description: <sup
                                            class="text-danger">*</sup></label>
                                    <textarea name="value_section_description"
                                        class="form-control mb-2 @error('value_section_description') is-invalid @enderror" rows="6">{{ $themeOption->value_section_description }}</textarea>
                                    @error('value_section_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class=" btn btn-md btn-primary" value="Update">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Footer One</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="footer_one_title"
                                    class="form-control mb-2 @error('footer_one_title') is-invalid @enderror"
                                    placeholder="Title" value="{{ $themeOption->footer_one_title }}">
                                @error('footer_one_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Footer one: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="footer_one" class="form-control mb-2 @error('footer_one') is-invalid @enderror" rows="6">{{ $themeOption->footer_one }}</textarea>
                                @error('footer_one')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Footer Two</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="footer_two_title"
                                    class="form-control mb-2 @error('footer_two_title') is-invalid @enderror"
                                    placeholder="Title" value="{{ $themeOption->footer_two_title }}">
                                @error('footer_two_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Footer Two: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="footer_two" class="form-control mb-2 @error('footer_two') is-invalid @enderror" rows="6">{{ $themeOption->footer_two }}</textarea>
                                @error('footer_two')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Footer Three</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="footer_three_title"
                                    class="form-control mb-2 @error('footer_three_title') is-invalid @enderror"
                                    placeholder="Title" value="{{ $themeOption->footer_three_title }}">
                                @error('footer_three_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Footer Two: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="footer_three" class="form-control mb-2 @error('footer_three') is-invalid @enderror" rows="6">{{ $themeOption->footer_three }}</textarea>
                                @error('footer_three')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Footer Four</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Titel: <sup class="text-danger">*</sup></label>
                                <input type="text" name="footer_four_title"
                                    class="form-control mb-2 @error('footer_four_title') is-invalid @enderror"
                                    placeholder="Title" value="{{ $themeOption->footer_four_title }}">
                                @error('footer_four_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Footer Two: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="footer_four" class="form-control mb-2 @error('footer_four') is-invalid @enderror" rows="6">{{ $themeOption->footer_four }}</textarea>
                                @error('footer_four')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Bottom Footer</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="" class="form-label">Bottom Footer: <sup
                                        class="text-danger">*</sup></label>
                                <textarea name="bottom_footer" class="form-control mb-2 @error('bottom_footer') is-invalid @enderror"
                                    rows="6">{{ $themeOption->bottom_footer }}</textarea>
                                @error('bottom_footer')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class=" btn btn-md btn-primary" value="Update">
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection


@section('script')
    <script>
        //logo change
        let imgf = document.getElementById("file_input");
        let output = document.getElementById("show_img");

        imgf.addEventListener("change", function(event) {
            let tmppath = URL.createObjectURL(event.target.files[0]);
            output.src = tmppath;
        });
    </script>
@endsection
