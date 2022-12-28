<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $sliders = Slider::paginate( 10 );
        return view( 'backend.slider.index', compact( 'sliders' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $file      = $request->file( 'slide' );
        $file_type = explode( '/', $file->getMimeType() );

        if ( reset( $file_type ) == 'video' ) {

            $request->validate( [
                "title"       => 'required',
                "description" => 'nullable',
                "slide"       => 'required|mimetypes:video/x-ms-asf|max:10000',
            ] );

            $image_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $type       = "video";
            $upload     = Storage::putFileAs( 'slide/', $file, $image_name );
        } else {
            $request->validate( [
                "title"       => 'required',
                "description" => 'nullable',
                "slide"       => 'required|max:1024|mimes:png,jpg,webp,mp4',
            ] );
            $image_name = Str::uuid() . '.' . $file->extension();
            $type       = "image";
            $upload     = Image::make( $file )->crop( 1920, 800 )->save( public_path( 'storage/slide/' . $image_name ) );
        }

        if ( $upload ) {
            Slider::create( [
                "title"       => $request->title,
                "description" => $request->description,
                "slide"       => $image_name,
                "slide_type"  => $type,
            ] );
            return back()->with( 'success', 'Slide Insert Successfully Done!' );
        } else {
            return back()->with( 'error', 'File not Uploading!' );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show( Slider $slider ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit( Slider $slider ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Slider $slider ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy( Slider $slider ) {
        //
    }
}