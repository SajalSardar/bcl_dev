<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\PageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $about       = About::firstOrfail();
        $page_header = PageBanner::where( 'page', 'about' )->firstOrFail();
        return view( 'backend.about.index', compact( 'about', 'page_header' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, About $about ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title"       => 'required|unique:companies,title',
            "description" => 'required',
            "image"       => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $banner_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 500, 500 )->save( public_path( 'storage/uploads/' . $banner_name ) );
        } else {
            $banner_name = $about->image;
        }

        $update = $about->update( [
            "title"       => $request->title,
            "description" => $request->description,
            "image"       => $banner_name,
        ] );

        if ( $update ) {
            return back()->with( 'success', 'About Update Successfully Done!' );
        } else {
            return back()->with( 'success', ' About Update Fail!' );
        }
    }

    public function aboutPageHeader( Request $request, $id ) {
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