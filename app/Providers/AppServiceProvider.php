<?php

namespace App\Providers;

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
        View::share( ['themeOption' => $themeOption, 'socialLinks' => $socialLinks] );
    }
}