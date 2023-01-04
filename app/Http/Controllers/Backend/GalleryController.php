<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\PageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $galleries   = Gallery::orderBy( 'id', 'desc' )->paginate( 30 );
        $page_header = PageBanner::where( 'page', 'gallery' )->firstOrFail();
        return view( 'backend.gallery.index', compact( 'galleries', 'page_header' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title" => 'required',
            "image" => 'required|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $image_name = Str::uuid() . '.' . $file->extension();
            $upload     = Image::make( $file )->crop( 800, 600 )->save( public_path( 'storage/gallery/' . $image_name ) );
        }

        if ( $upload ) {
            $success = Gallery::create( [
                "title" => $request->title,
                "image" => $image_name,
            ] );
            if ( $success ) {

                return back()->with( 'success', 'Gallery Store Successfully Done!' );
            } else {
                return back()->with( 'success', 'Gallery Insert Failed!' );
            }
        } else {
            return back()->with( 'error', 'File not Uploading!' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit( Gallery $gallery ) {
        return view( 'backend.gallery.edit', compact( 'gallery' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Gallery $gallery ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title" => 'required',
            "image" => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            if ( file_exists( public_path( 'storage/gallery/' . $gallery->image ) ) ) {
                Storage::delete( 'gallery/' . $gallery->image );
            }
            $image_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 800, 600 )->save( public_path( 'storage/gallery/' . $image_name ) );
        } else {
            $image_name = $gallery->image;
        }

        $success = $gallery->update( [
            "title" => $request->title,
            "image" => $image_name,
        ] );
        if ( $success ) {

            return redirect()->route( 'dashboard.gallery.index' )->with( 'success', 'Gallery Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.gallery.index' )->with( 'success', 'Gallery Update Failed!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy( Gallery $gallery ) {
        if ( file_exists( public_path( 'storage/gallery/' . $gallery->image ) ) ) {
            Storage::delete( 'gallery/' . $gallery->image );
        }
        $success = $gallery->delete();
        if ( $success ) {

            return redirect()->route( 'dashboard.gallery.index' )->with( 'success', 'Gallery Delete Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.gallery.index' )->with( 'success', 'Gallery Delete Failed!' );
        }
    }

    /**
     * product Status Update.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function galleryStatusUpdate( Gallery $gallery ) {

        if ( $gallery->status == 1 ) {
            $gallery->update( [
                'status' => 2,
            ] );
        } else {
            $gallery->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.gallery.index' )->with( 'success', 'Status Update Successfully Done!' );
    }

    public function galleryPageHeader( Request $request, $id ) {
        $file        = $request->file( 'header_banner' );
        $page_header = PageBanner::where( 'id', $id )->firstOrFail();

        $request->validate( [
            "header_banner" => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $banner_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 1700, 500 )->save( public_path( 'storage/uploads/' . $banner_name ) );
        } else {
            $banner_name = $page_header->banner;
        }

        $update = $page_header->update( [
            "banner" => $banner_name,
        ] );

        if ( $update ) {
            return back()->with( 'success', 'Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Update Fail!' );
        }
    }
}