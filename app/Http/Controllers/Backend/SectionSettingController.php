<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SectionSetting;
use Illuminate\Http\Request;

class SectionSettingController extends Controller {

    public function sectionSettings() {
        $sections = SectionSetting::all();
        return view( 'backend.setting.sectionsetting', compact( 'sections' ) );
    }

    public function sectionSettingsUpdate( Request $request ) {
        $sections = SectionSetting::all();
        foreach ( $sections as $sections ) {
            if ( !in_array( $sections->id, $request->section ) ) {
                $sections->update( [
                    'status' => 2,
                ] );
            } else {
                $sections->update( [
                    'status' => 1,
                ] );
            }
        }
        return back()->with( 'success', 'Update Successfull!' );
    }
}