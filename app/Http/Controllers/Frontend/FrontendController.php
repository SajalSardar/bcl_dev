<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Company;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Counter;
use App\Models\Employee;
use App\Models\Gallery;
use App\Models\HomeAbout;
use App\Models\HomeMission;
use App\Models\MissionVission;
use App\Models\PageBanner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Sustainability;
use App\Models\Values;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller {

    //view home page
    public function index() {
        $sliders        = Slider::where('status', 1)->orderBy('id', 'desc')->get();
        $home_about     = HomeAbout::first();
        $counters       = Counter::where('status', 1)->take(4)->get();
        $companies      = Company::where('status', 1)->take(6)->get();
        $homeMission    = HomeMission::first();
        $sustainability = Sustainability::first();
        $values         = Values::where('status', 1)->take(5)->get();
        $employee       = Employee::first();
        return view('frontend.index', compact('sliders', 'home_about', 'counters', 'companies', 'homeMission', 'sustainability', 'values', 'employee'));
    }

    //view about page
    public function about() {
        $about          = About::first();
        $page_banner    = PageBanner::where('page', 'about')->first();
        $missionVission = MissionVission::where('status', 1)->get();
        return view('frontend.about', compact('about', 'page_banner', 'missionVission'));
    }

    public function aboutBlockSingle($slug) {
        $missionVission = MissionVission::where('slug', $slug)->firstOrFail();
        return view('frontend.aboutsingle', compact('missionVission'));
    }

    //view product page
    public function product() {
        $categories  = ProductCategory::with('products')->where('status', 1)->get();
        $products    = Product::with('category')->where('status', 1)->get();
        $page_banner = PageBanner::where('page', 'product')->first();
        return view('frontend.product', compact('categories', 'products', 'page_banner'));
    }

    //view sustainability page
    public function sustainability() {
        $page_banner    = PageBanner::where('page', 'sustainability')->first();
        $sustainability = Sustainability::where('status', 1)->get();
        return view('frontend.sustainability', compact('page_banner', 'sustainability'));
    }

    //view gallery page
    public function gallery() {
        $page_banner = PageBanner::where('page', 'gallery')->first();
        $galleries   = Gallery::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.gallery', compact('galleries', 'page_banner'));
    }

    //view contact page
    public function contact() {
        $page_banner = PageBanner::where('page', 'contact')->first();
        $contact     = Contact::first();
        return view('frontend.contact', compact('page_banner', 'contact'));
    }
    //view compliance page
    public function compliance() {
        $page_banner = PageBanner::where('page', 'about')->first();

        return view('frontend.compliance', compact('page_banner'));
    }

    public function contactStore(Request $request) {
        $request->validate([
            "name"    => 'required',
            "email"   => 'required|email',
            "subject" => 'required',
            "message" => 'required',
        ]);

        $success = ContactMessage::create([
            "name"    => $request->name,
            "email"   => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);
        if ($success) {
            return back()->with('success', "Message Successfully Send!");
        } else {
            return back()->with('error', "Message Send Error!");
        }
    }

    //view profile page
    public function profile() {
        $page_banner = PageBanner::where('page', 'profile')->first();
        $profile     = Profile::first();
        return view('frontend.profile', compact('page_banner', 'profile'));
    }

    public function downloadProfile() {
        $profile = Profile::first();
        return Storage::download('uploads/' . $profile->profile);
    }

}