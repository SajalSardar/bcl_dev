<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $profile = Profile::firstOrfail();
        return view( 'backend.profile.index', compact( 'profile' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Profile $profile ) {
        $file         = $request->file( 'image' );
        $profile_pdf  = $request->file( 'profile' );
        $profile_name = null;

        $request->validate( [
            "title"       => 'required|unique:products,title',
            "description" => 'required',
            "profile"     => 'nullable|max:10000|mimes:pdf',
            "image"       => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            if ( file_exists( public_path( 'storage/uploads/' . $profile->image ) ) ) {
                Storage::delete( 'uploads/' . $profile->image );
            }
            $image_name = Str::uuid() . '.' . $file->extension();
            $upload     = Image::make( $file )->crop( 800, 1000 )->save( public_path( 'storage/uploads/' . $image_name ) );
        } else {
            $image_name = $profile->image;
        }

        if ( $profile_pdf ) {
            if ( file_exists( public_path( 'storage/uploads/' . $profile->profile ) ) ) {
                Storage::delete( 'uploads/' . $profile->profile );
            }
            $profile_name = Str::uuid() . '.' . $profile_pdf->extension();
            Storage::putFileAs( 'uploads/', $profile_pdf, $profile_name );
        } else {
            $profile_name = $profile->profile;
        }

        $success = Profile::create( [
            "title"       => $request->title,
            "profile"     => $profile_name,
            "description" => $request->description,
            "image"       => $image_name,
        ] );
        if ( $success ) {

            return back()->with( 'success', 'Profile Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Profile Update Failed!' );
        }

    }

}