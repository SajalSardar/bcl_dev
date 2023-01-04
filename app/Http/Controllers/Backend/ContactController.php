<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\PageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ContactController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contact     = Contact::firstOrFail();
        $page_header = PageBanner::where( 'page', 'contact' )->firstOrFail();
        return view( 'backend.contact.index', compact( 'contact', 'page_header' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Contact $contact ) {
        $request->validate( [
            "address_title" => 'required',
            "address_icon"  => 'required',
            "address"       => 'required',
            "email_title"   => 'required',
            "email_icon"    => 'required',
            "email"         => 'required',
            "call_title"    => 'required',
            "call_icon"     => 'required',
            "number"        => 'required',
            "map_location"  => 'required',
        ] );

        $success = $contact->update( [
            "address_title" => $request->address_title,
            "address_icon"  => $request->address_icon,
            "address"       => $request->address,
            "email_title"   => $request->email_title,
            "email_icon"    => $request->email_icon,
            "email"         => $request->email,
            "call_title"    => $request->call_title,
            "call_icon"     => $request->call_icon,
            "number"        => $request->number,
            "map"           => $request->map_location,
        ] );
        if ( $success ) {

            return back()->with( 'success', 'Contact Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Contact Update Failed!' );
        }
    }

    public function contactPageHeader( Request $request, $id ) {
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

    public function contactMessage() {
        $messages = ContactMessage::orderBy( 'id', 'desc' )->paginate( 30 );
        return view( 'backend.contact.message', compact( 'messages' ) );
    }

    public function contactMessageDelete( $id ) {
        $message = ContactMessage::findOrFail( $id );
        $message->delete();
        return back()->with( 'success', 'Delete Successfully Done!' );
    }

    public function contactMessageShow( $id ) {
        $message = ContactMessage::findOrFail( $id );
        $message->update( [
            "status" => 2,
        ] );
        return view( 'backend.contact.show', compact( 'message' ) );
    }

}