<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CounterController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\HomeAboutController;
use App\Http\Controllers\Backend\HomeMissionController;
use App\Http\Controllers\Backend\MissionVissionController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController as BackendProfileController;
use App\Http\Controllers\Backend\SectionSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SocialLinkController;
use App\Http\Controllers\Backend\SustainabilityController;
use App\Http\Controllers\Backend\ValuesController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller( FrontendController::class )->name( 'frontend.' )->group( function () {
    Route::get( '/', 'index' )->name( 'index' );
    Route::get( '/about', 'about' )->name( 'about' );
    Route::get( '/product', 'product' )->name( 'product' );
    Route::get( '/sustainability', 'sustainability' )->name( 'sustainability' );
    Route::get( '/gallery', 'gallery' )->name( 'gallery' );
    Route::get( '/contact', 'contact' )->name( 'contact' );
    Route::get( '/barison/profile', 'profile' )->name( 'profile' );
} );
Route::get( '/dashboard', [BackendController::class, 'index'] )->name( 'dashboard.index' )->middleware( ['auth', 'verified'] );
Route::prefix( 'dashboard' )->name( 'dashboard.' )->middleware( ['auth', 'verified', 'admin'] )->group( function () {
    Route::resource( '/slider', SliderController::class )->except( ['create', 'show'] );
    Route::get( '/slider/status/update/{slider}', [SliderController::class, 'sliderStatusUpdate'] )->name( 'slider.status.update' );
    Route::resource( '/mission-vission', MissionVissionController::class )->except( ['create', 'show'] );
    Route::get( '/mission-vission/status/update/{missionVission}', [MissionVissionController::class, 'mvStatusUpdate'] )->name( 'mission.vission.status' );
    Route::resource( '/counter', CounterController::class );
    Route::get( '/counter/status/update/{counter}', [CounterController::class, 'counterStatusUpdate'] )->name( 'counter.status' );
    Route::resource( '/company', CompanyController::class )->except( ['create', 'show'] );
    Route::get( '/company/status/update/{company}', [CompanyController::class, 'companyStatusUpdate'] )->name( 'company.status' );
    Route::resource( '/about', AboutController::class )->only( ['index', 'update'] );
    Route::resource( '/product-category', ProductCategoryController::class )->except( ['create', 'show'] );
    Route::resource( '/product', ProductController::class );
    Route::get( '/product/status/update/{product}', [ProductController::class, 'productStatusUpdate'] )->name( 'product.status.update' );
    Route::resource( '/sustainability', SustainabilityController::class )->except( ['create', 'show'] );
    Route::get( '/sustainability/status/update/{sustainability}', [SustainabilityController::class, 'sustainabilityStatusUpdate'] )->name( 'sustainability.status' );
    Route::resource( '/gallery', GalleryController::class )->except( ['create', 'show'] );
    Route::get( '/gallery/status/update/{gallery}', [GalleryController::class, 'galleryStatusUpdate'] )->name( 'gallery.status.update' );
    Route::resource( '/contact', ContactController::class )->only( ['index', 'update'] );
    Route::resource( '/profile', BackendProfileController::class )->only( ['index', 'update'] );
    Route::resource( '/value', ValuesController::class )->except( ['create', 'show'] );
    Route::get( '/value/status/update/{value}', [ValuesController::class, 'valueStatusUpdate'] )->name( 'value.status.update' );
    Route::resource( '/home-about', HomeAboutController::class )->only( ['index', 'update'] );
    Route::resource( '/home-mission', HomeMissionController::class )->only( ['index', 'update'] );
    Route::resource( '/employee', EmployeeController::class )->only( ['index', 'update'] );
    Route::resource( '/social-link', SocialLinkController::class );
    Route::get( '/social-link/status/{socialLink}', [SocialLinkController::class, 'socialLinkStatusUpdate'] )->name( 'social.status.update' );

    Route::get( '/section-settings', [SectionSettingController::class, 'sectionSettings'] )->name( 'setting.section' );
    Route::post( '/section-settings', [SectionSettingController::class, 'sectionSettingsUpdate'] )->name( 'setting.section.update' );
} );

Route::middleware( 'auth' )->group( function () {
    Route::get( '/profile', [ProfileController::class, 'edit'] )->name( 'profile.edit' );
    Route::patch( '/profile', [ProfileController::class, 'update'] )->name( 'profile.update' );
    Route::delete( '/profile', [ProfileController::class, 'destroy'] )->name( 'profile.destroy' );
} );

require __DIR__ . '/auth.php';