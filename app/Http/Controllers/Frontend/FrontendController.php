<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontendController extends Controller {

    //view home page
    public function index() {
        return view( 'frontend.index' );

    }

    //view about page
    public function about() {
        return view( 'frontend.about' );
    }

    //view product page
    public function product() {
        return view( 'frontend.product' );
    }

    //view sustainability page
    public function sustainability() {
        return view( 'frontend.sustainability' );
    }

    //view gallery page
    public function gallery() {
        return view( 'frontend.gallery' );
    }

    //view contact page
    public function contact() {
        return view( 'frontend.contact' );
    }

    //view profile page
    public function profile() {
        return view( 'frontend.profile' );
    }
}