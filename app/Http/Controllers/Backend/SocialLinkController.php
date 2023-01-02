<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $socials = SocialLink::all();
        return view( 'backend.social.index', compact( 'socials' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            "title" => 'required|unique:social_links,title',
            "icon"  => 'required',
            "link"  => 'required',
        ] );

        $success = SocialLink::create( [
            "title" => $request->title,
            "icon"  => $request->icon,
            "link"  => $request->link,
        ] );
        if ( $success ) {

            return back()->with( 'success', 'Add Social Link Successfully Done!' );
        } else {
            return back()->with( 'success', 'Social Link Insert Failed!' );
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit( SocialLink $socialLink ) {
        return view( 'backend.social.edit', compact( 'socialLink' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, SocialLink $socialLink ) {
        $request->validate( [
            "title" => 'required|unique:social_links,title,' . $socialLink->id,
            "icon"  => 'required',
            "link"  => 'required',
        ] );

        $success = $socialLink->create( [
            "title" => $request->title,
            "icon"  => $request->icon,
            "link"  => $request->link,
        ] );
        if ( $success ) {

            return redirect()->route( 'dashboard.social-link.index' )->with( 'success', 'Update Social Link Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.social-link.index' )->with( 'success', 'Social Link Update Failed!' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy( SocialLink $socialLink ) {
        $socialLink->delete();
        return redirect()->route( 'dashboard.social-link.index' )->with( 'success', ' Social Link Deleted Successfully Done!' );
    }

    /**
     * Social link Status Update.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function socialLinkStatusUpdate( SocialLink $socialLink ) {

        if ( $socialLink->status == 1 ) {
            $socialLink->update( [
                'status' => 2,
            ] );
            return redirect()->route( 'dashboard.social-link.index' )->with( 'success', 'Status Update Successfully Done!' );
        } else {
            $socialLink->update( [
                'status' => 1,
            ] );
            return redirect()->route( 'dashboard.social-link.index' )->with( 'success', 'Status Update Successfully Done!' );
        }
        return redirect()->route( 'dashboard.social-link.index' )->with( 'error', 'Status Update Failed!' );

    }

}