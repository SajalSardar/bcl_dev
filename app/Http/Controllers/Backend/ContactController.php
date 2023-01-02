<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contact = Contact::firstOrFail();
        return view( 'backend.contact.index', compact( 'contact' ) );
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
}