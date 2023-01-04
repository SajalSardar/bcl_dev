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
        $sliders = Slider::orderBy( 'id', 'desc' )->paginate( 30 );
        return view( 'backend.slider.index', compact( 'sliders' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $file = $request->file( 'slide' );

        $request->validate( [
            "title"       => 'required',
            "description" => 'nullable',
            "slide"       => 'required',
        ] );

        if ( $file ) {
            $file_type = explode( '/', $file->getMimeType() );
            if ( reset( $file_type ) == 'video' ) {

                $request->validate( [
                    "slide" => 'mimetypes:video/x-ms-asf,video/mp4,video/wmv|max:10000',
                ] );

                $image_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $type       = "video";
                $upload     = Storage::putFileAs( 'slide/', $file, $image_name );
            } else {
                $request->validate( [
                    "slide" => 'max:1024|mimes:png,jpg,webp,mp4',
                ] );
                $image_name = Str::uuid() . '.' . $file->extension();
                $type       = "image";
                $upload     = Image::make( $file )->crop( 1700, 700 )->save( public_path( 'storage/slide/' . $image_name ) );
            }
        }

        if ( $upload ) {
            $success = Slider::create( [
                "title"       => $request->title,
                "description" => $request->description,
                "slide"       => $image_name,
                "slide_type"  => $type,
            ] );
            if ( $success ) {

                return back()->with( 'success', 'Slide Insert Successfully Done!' );
            } else {
                return back()->with( 'success', 'Slide Insert Failed!' );
            }
        } else {
            return back()->with( 'error', 'File not Uploading!' );
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit( Slider $slider ) {
        return view( 'backend.slider.edit', compact( 'slider' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Slider $slider ) {
        $file = $request->file( 'slide' );

        $request->validate( [
            "title"       => 'required',
            "description" => 'nullable',
            "slide"       => 'nullable',
        ] );

        if ( $file ) {
            $file_type = explode( '/', $file->getMimeType() );
            if ( reset( $file_type ) == 'video' ) {

                $request->validate( [
                    "slide" => 'mimetypes:video/x-ms-asf,video/mp4,video/wmv|max:10000',
                ] );
                if ( file_exists( public_path( 'storage/slide/' . $slider->slide ) ) ) {
                    Storage::delete( 'slide/' . $slider->slide );
                }
                $image_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $type       = "video";
                $upload     = Storage::putFileAs( 'slide/', $file, $image_name );
            } else {
                $request->validate( [
                    "slide" => 'max:1024|mimes:png,jpg,webp,mp4',
                ] );
                if ( file_exists( public_path( 'storage/slide/' . $slider->slide ) ) ) {
                    Storage::delete( 'slide/' . $slider->slide );
                }
                $image_name = Str::uuid() . '.' . $file->extension();
                $type       = "image";
                $upload     = Image::make( $file )->crop( 1700, 700 )->save( public_path( 'storage/slide/' . $image_name ) );
            }
        } else {
            $image_name = $slider->slide;
            $type       = $slider->slide_type;
        }

        $success = Slider::create( [
            "title"       => $request->title,
            "description" => $request->description,
            "slide"       => $image_name,
            "slide_type"  => $type,
        ] );

        if ( $success ) {

            return redirect()->route( 'dashboard.slider.index' )->with( 'success', 'Slide Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.slider.index' )->with( 'success', 'Slide Update failed!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy( Slider $slider ) {
        if ( file_exists( public_path( 'storage/slide/' . $slider->slide ) ) ) {
            Storage::delete( 'slide/' . $slider->slide );
        }
        $slider->delete();
        return redirect()->route( 'dashboard.slider.index' )->with( 'success', 'Slide Delete Successfully Done!' );
    }

    /**
     * Slider Status Update.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function sliderStatusUpdate( Slider $slider ) {

        if ( $slider->status == 1 ) {
            $slider->update( [
                'status' => 2,
            ] );
        } else {
            $slider->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.slider.index' )->with( 'success', 'Slide Status Update Successfully Done!' );
    }
}