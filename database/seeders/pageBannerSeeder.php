<?php

namespace Database\Seeders;

use App\Models\PageBanner;
use Illuminate\Database\Seeder;

class pageBannerSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $arrayOfPageNames = ['about', 'product', 'sustainability', 'gallery', 'contact', 'profile'];

        $sections = collect( $arrayOfPageNames )->map( function ( $section ) {
            return ['page' => $section, 'banner' => 'banner.jpg'];
        } );

        PageBanner::insert( $sections->toArray() );
    }
}