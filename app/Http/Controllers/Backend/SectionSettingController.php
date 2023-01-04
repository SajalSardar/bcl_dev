<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SectionSetting;
use App\Models\ThemeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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

    public function themeOptionEdit() {
        return view( 'backend.setting.option' );
    }

    public function themeOptionUpdate( Request $request ) {
        $themeOption = ThemeOption::firstOrFail();
        $file        = $request->file( 'logo' );

        $request->validate( [
            "header_number"                      => 'required',
            "logo"                               => 'nullable|max:512|mimes:png,jpg,webp',
            "company_section_title"              => 'required',
            "company_section_description"        => 'required',
            "sustainability_section_title"       => 'required',
            "sustainability_section_description" => 'required',
            "value_section_title"                => 'required',
            "value_section_description"          => 'required',
            "footer_one_title"                   => 'required',
            "footer_one"                         => 'required',
            "footer_two_title"                   => 'required',
            "footer_two"                         => 'required',
            "footer_three_title"                 => 'required',
            "footer_three"                       => 'required',
            "footer_four_title"                  => 'required',
            "footer_four"                        => 'required',
            "bottom_footer"                      => 'required',
        ] );

        if ( $file ) {

            if ( file_exists( public_path( 'storage/uploads/' . $themeOption->logo ) ) ) {
                Storage::delete( 'uploads/' . $themeOption->logo );
            }

            $logo_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 300, 110 )->save( public_path( 'storage/uploads/' . $logo_name ) );
        } else {
            $logo_name = $themeOption->logo;

        }

        $update = $themeOption->update( [
            "header_number"                      => $request->header_number,
            "logo"                               => $logo_name,
            "company_section_title"              => $request->company_section_title,
            "company_section_description"        => $request->company_section_description,
            "sustainability_section_title"       => $request->sustainability_section_title,
            "sustainability_section_description" => $request->sustainability_section_description,
            "value_section_title"                => $request->value_section_title,
            "value_section_description"          => $request->value_section_description,
            "footer_one_title"                   => $request->footer_one_title,
            "footer_one"                         => $request->footer_one,
            "footer_two_title"                   => $request->footer_two_title,
            "footer_two"                         => $request->footer_two,
            "footer_three_title"                 => $request->footer_three_title,
            "footer_three"                       => $request->footer_three,
            "footer_four_title"                  => $request->footer_four_title,
            "footer_four"                        => $request->footer_four,
            "bottom_footer"                      => $request->bottom_footer,
        ] );

        if ( $update ) {
            return back()->with( 'success', 'Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Update Fail!' );
        }
    }
}