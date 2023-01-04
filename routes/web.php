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
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller( FrontendController::class )->name( 'frontend.' )->group( function () {
    Route::get( '/', 'index' )->name( 'index' );
    Route::get( '/about', 'about' )->name( 'about' );
    Route::get( '/about/{slug}', 'aboutBlockSingle' )->name( 'about.block.single' );
    Route::get( '/product', 'product' )->name( 'product' );
    Route::get( '/sustainability', 'sustainability' )->name( 'sustainability' );
    Route::get( '/gallery', 'gallery' )->name( 'gallery' );
    Route::get( '/contact', 'contact' )->name( 'contact' );
    Route::post( '/contact', 'contactStore' )->name( 'contact.store' );
    Route::get( '/barison/profile', 'profile' )->name( 'profile' );
    Route::get( '/profile/download', 'downloadProfile' )->name( 'profile.download' );
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
    Route::put( '/about/header/{id}', [AboutController::class, 'aboutPageHeader'] )->name( 'about.page.header.update' );

    Route::resource( '/product-category', ProductCategoryController::class )->except( ['create', 'show'] );
    Route::resource( '/product', ProductController::class );
    Route::get( '/product/status/update/{product}', [ProductController::class, 'productStatusUpdate'] )->name( 'product.status.update' );
    Route::put( '/product/header/{id}', [ProductController::class, 'productPageHeader'] )->name( 'product.page.header.update' );

    Route::resource( '/sustainability', SustainabilityController::class )->except( ['create', 'show'] );
    Route::get( '/sustainability/status/update/{sustainability}', [SustainabilityController::class, 'sustainabilityStatusUpdate'] )->name( 'sustainability.status' );
    Route::put( '/sustainability/header/{id}', [SustainabilityController::class, 'sustainabilityPageHeader'] )->name( 'sustainability.page.header.update' );

    Route::resource( '/gallery', GalleryController::class )->except( ['create', 'show'] );
    Route::get( '/gallery/status/update/{gallery}', [GalleryController::class, 'galleryStatusUpdate'] )->name( 'gallery.status.update' );
    Route::put( '/gallery/header/{id}', [GalleryController::class, 'galleryPageHeader'] )->name( 'gallery.page.header.update' );

    Route::resource( '/contact', ContactController::class )->only( ['index', 'update'] );
    Route::controller( ContactController::class )->prefix( 'contact' )->name( 'contact.' )->group( function () {

        Route::put( '/header/{id}', 'contactPageHeader' )->name( 'page.header.update' );
        Route::get( '/message', 'contactMessage' )->name( 'message' );
        Route::delete( '/message/{id}', 'contactMessageDelete' )->name( 'message.destroy' );
        Route::get( '/message/{id}', 'contactMessageShow' )->name( 'message.show' );
    } );

    Route::resource( '/profile', BackendProfileController::class )->only( ['index', 'update'] );
    Route::put( '/profile/header/{id}', [BackendProfileController::class, 'profilePageHeader'] )->name( 'profile.page.header.update' );

    Route::resource( '/value', ValuesController::class )->except( ['create', 'show'] );
    Route::get( '/value/status/update/{value}', [ValuesController::class, 'valueStatusUpdate'] )->name( 'value.status.update' );

    Route::resource( '/home-about', HomeAboutController::class )->only( ['index', 'update'] );
    Route::resource( '/home-mission', HomeMissionController::class )->only( ['index', 'update'] );
    Route::resource( '/employee', EmployeeController::class )->only( ['index', 'update'] );

    Route::resource( '/social-link', SocialLinkController::class );
    Route::get( '/social-link/status/{socialLink}', [SocialLinkController::class, 'socialLinkStatusUpdate'] )->name( 'social.status.update' );

    Route::controller( SectionSettingController::class )->name( 'setting.' )->group( function () {
        Route::get( '/section-settings', 'sectionSettings' )->name( 'section' );
        Route::post( '/section-settings', 'sectionSettingsUpdate' )->name( 'section.update' );
        Route::get( '/theme-option', 'themeOptionEdit' )->name( 'theme.option.edit' );
        Route::post( '/theme-option', 'themeOptionUpdate' )->name( 'theme.option.Update' );
    } );

    Route::controller( UserController::class )->name( 'user.' )->group( function () {
        Route::get( '/users', 'index' )->name( 'index' );
        Route::get( '/user/create', 'create' )->name( 'create' );
        Route::post( '/user/create', 'store' )->name( 'store' );
    } );

} );

Route::middleware( 'auth' )->group( function () {
    Route::controller( ProfileController::class )->prefix( 'profile' )->name( 'profile.' )->group( function () {
        Route::get( '/', 'edit' )->name( 'edit' );
        Route::patch( '/', 'update' )->name( 'update' );
        Route::delete( '/', 'destroy' )->name( 'destroy' );
    } );

} );

require __DIR__ . '/auth.php';