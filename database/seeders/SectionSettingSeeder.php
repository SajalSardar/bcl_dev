<?php

namespace Database\Seeders;

use App\Models\SectionSetting;
use Illuminate\Database\Seeder;

class SectionSettingSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $arrayOfSectionNames = ['top header', 'main menu', 'hero area', 'home About', 'counter', 'our Company', 'home mission', 'home sustainability', 'our values', 'our employees', 'main footer', 'bottom footer', 'contact page map', 'about page block'];

        $sections = collect( $arrayOfSectionNames )->map( function ( $section ) {
            return ['section' => $section, 'created_at' => now()];
        } );

        SectionSetting::insert( $sections->toArray() );
    }
}