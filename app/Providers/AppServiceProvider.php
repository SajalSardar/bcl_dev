<?php

namespace App\Providers;

use App\Models\SectionSetting;
use App\Models\SocialLink;
use App\Models\ThemeOption;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        Schema::defaultStringLength( 191 );
        Paginator::useBootstrapFive();
        $themeOption = ThemeOption::first();
        $socialLinks = SocialLink::all();

        $masterSectionSettings = [
            'topHeader'          => $this->sectionSetting( 'top header' ),
            'mainMenu'           => $this->sectionSetting( 'main menu' ),
            'mainFooter'         => $this->sectionSetting( 'main footer' ),
            'bottomFooter'       => $this->sectionSetting( 'bottom footer' ),
            'slider'             => $this->sectionSetting( 'hero area' ),
            'homeAbout'          => $this->sectionSetting( 'home About' ),
            'counter'            => $this->sectionSetting( 'counter' ),
            'company'            => $this->sectionSetting( 'our Company' ),
            'homeMission'        => $this->sectionSetting( 'home mission' ),
            'homeSustainability' => $this->sectionSetting( 'home sustainability' ),
            'values'             => $this->sectionSetting( 'our values' ),
            'employees'          => $this->sectionSetting( 'our employees' ),
            'gMap'               => $this->sectionSetting( 'contact page map' ),
            'aboutBlock'         => $this->sectionSetting( 'about page block' ),
        ];

        View::share( [
            'themeOption'           => $themeOption,
            'socialLinks'           => $socialLinks,
            'masterSectionSettings' => $masterSectionSettings] );
    }

    public function sectionSetting( $section ) {
        return SectionSetting::where( 'section', $section )->where( 'status', 1 )->count();
    }
}