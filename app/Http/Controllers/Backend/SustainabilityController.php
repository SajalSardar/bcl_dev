<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use App\Models\Sustainability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SustainabilityController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $sustainabilities = Sustainability::orderBy( 'id', 'desc' )->paginate( 20 );
        $page_header      = PageBanner::where( 'page', 'sustainability' )->firstOrFail();
        return view( 'backend.sustainability.index', compact( 'sustainabilities', 'page_header' ) );
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
            "title"       => 'required|unique:sustainabilities,title',
            "description" => 'required',
            "image"       => 'required|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $banner_name = Str::uuid() . '.' . $file->extension();
            $upload      = Image::make( $file )->crop( 600, 550 )->save( public_path( 'storage/sustainability/' . $banner_name ) );
        }

        if ( $upload ) {
            $success = Sustainability::create( [
                "title"       => $request->title,
                "slug"        => Str::slug( $request->title ),
                "description" => $request->description,
                "image"       => $banner_name,
            ] );
            if ( $success ) {
                return back()->with( 'success', 'Insert Successfully Done!' );
            } else {
                return back()->with( 'success', 'Insert failed!' );
            }
        } else {
            return back()->with( 'error', 'File not Uploading!' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sustainability  $sustainability
     * @return \Illuminate\Http\Response
     */
    public function edit( Sustainability $sustainability ) {
        return view( 'backend.sustainability.edit', compact( 'sustainability' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sustainability  $sustainability
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Sustainability $sustainability ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title"       => 'required|unique:sustainabilities,title,' . $sustainability->id,
            "description" => 'required',
            "image"       => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            if ( file_exists( public_path( 'storage/sustainability/' . $sustainability->image ) ) ) {
                Storage::delete( 'sustainability/' . $sustainability->image );
            }
            $banner_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 600, 550 )->save( public_path( 'storage/sustainability/' . $banner_name ) );
        } else {
            $banner_name = $sustainability->image;
        }

        $success = $sustainability->update( [
            "title"       => $request->title,
            "slug"        => Str::slug( $request->title ),
            "description" => $request->description,
            "image"       => $banner_name,
        ] );
        if ( $success ) {
            return redirect()->route( 'dashboard.sustainability.index' )->with( 'success', 'Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.sustainability.index' )->with( 'success', 'Update failed!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sustainability  $sustainability
     * @return \Illuminate\Http\Response
     */
    public function destroy( Sustainability $sustainability ) {

        if ( file_exists( public_path( 'storage/sustainability/' . $sustainability->image ) ) ) {
            Storage::delete( 'sustainability/' . $sustainability->image );
        }
        $success = $sustainability->delete();
        if ( $success ) {
            return redirect()->route( 'dashboard.sustainability.index' )->with( 'success', ' Delete Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.sustainability.index' )->with( 'success', ' Delete failed!' );
        }
    }

    /**
     * company Status Update.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function sustainabilityStatusUpdate( Sustainability $sustainability ) {

        if ( $sustainability->status == 1 ) {
            $sustainability->update( [
                'status' => 2,
            ] );
        } else {
            $sustainability->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.sustainability.index' )->with( 'success', ' Status Update Successfully Done!' );
    }

    public function sustainabilityPageHeader( Request $request, $id ) {
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