<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Company;
use App\Models\Counter;
use App\Models\Employee;
use App\Models\HomeAbout;
use App\Models\HomeMission;
use App\Models\MissionVission;
use App\Models\PageBanner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use App\Models\Sustainability;
use App\Models\Values;

class FrontendController extends Controller {

    //view home page
    public function index() {
        $sliders        = Slider::where( 'status', 1 )->orderBy( 'id', 'desc' )->get();
        $home_about     = HomeAbout::first();
        $counters       = Counter::where( 'status', 1 )->take( 4 )->get();
        $companies      = Company::where( 'status', 1 )->take( 6 )->get();
        $homeMission    = HomeMission::first();
        $sustainability = Sustainability::first();
        $values         = Values::where( 'status', 1 )->take( 5 )->get();
        $employee       = Employee::first();
        return view( 'frontend.index', compact( 'sliders', 'home_about', 'counters', 'companies', 'homeMission', 'sustainability', 'values', 'employee' ) );
    }

    //view about page
    public function about() {
        $about          = About::first();
        $page_banner    = PageBanner::where( 'page', 'about' )->first();
        $missionVission = MissionVission::where( 'status', 1 )->get();
        return view( 'frontend.about', compact( 'about', 'page_banner', 'missionVission' ) );
    }

    public function aboutBlockSingle( $slug ) {
        $missionVission = MissionVission::where( 'slug', $slug )->firstOrFail();
        return view( 'frontend.aboutsingle', compact( 'missionVission' ) );
    }

    //view product page
    public function product() {
        $categories  = ProductCategory::with( 'products' )->where( 'status', 1 )->get();
        $products    = Product::with( 'category' )->where( 'status', 1 )->get();
        $page_banner = PageBanner::where( 'page', 'product' )->first();
        return view( 'frontend.product', compact( 'categories', 'products', 'page_banner' ) );
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