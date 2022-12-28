<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeAbout;
use Illuminate\Http\Request;

class HomeAboutController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $about = HomeAbout::firstOrFail();
        return view( 'backend.sections.homeabout', compact( 'about' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeAbout  $homeAbout
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, HomeAbout $homeAbout ) {
        $request->validate( [
            "title"        => 'required',
            "description"  => 'required|max:300',
            "year"         => 'required|integer',
            "bottom_title" => 'required',
        ] );

        $update = $homeAbout->update( [
            "title"             => $request->title,
            "description"       => $request->description,
            "year"              => $request->year,
            "year_bottom_title" => $request->bottom_title,
        ] );

        if ( $update ) {
            return back()->with( 'success', 'Home About Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Home About Update Fail!' );
        }
    }

}