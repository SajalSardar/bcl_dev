<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeMissionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $home_mission_area = HomeMission::firstOrFail();
        return view( 'backend.sections.missionvission', compact( 'home_mission_area' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeMission  $homeMission
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, HomeMission $homeMission ) {
        $file = $request->file( 'image' );
        $request->validate( [
            "title_one"         => 'required',
            "icon_one"          => 'required',
            "description_one"   => 'required',
            "title_two"         => 'required',
            "icon_two"          => 'required',
            "description_two"   => 'required',
            "title_three"       => 'required',
            "icon_three"        => 'required',
            "description_three" => 'required',
            "image"             => 'nullable|image|mimes:png,jpg|max:1024',
        ] );

        if ( $file ) {
            $image_name = Str::uuid() . '.' . $file->extension();
            if ( file_exists( public_path( 'storage/mission/' . $homeMission->image ) ) && $homeMission->image !== NULL ) {
                Storage::delete( 'mission/' . $homeMission->image );
            }
            $upload = Image::make( $file )->crop( 650, 500 )->save( public_path( 'storage/mission/' . $image_name ) );

        } else {
            $image_name = $homeMission->image;
        }

        $update = $homeMission->update( [
            'block_one_title'         => $request->title_one,
            'block_one_icon'          => $request->icon_one,
            'block_one_description'   => $request->description_one,
            'block_two_title'         => $request->title_two,
            'block_two_icon'          => $request->icon_two,
            'block_two_description'   => $request->description_two,
            'block_three_title'       => $request->title_three,
            'block_three_icon'        => $request->icon_three,
            'block_three_description' => $request->description_three,
            "image"                   => $image_name,
        ] );

        if ( $update ) {
            return back()->with( 'success', 'Home Mission Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Home Mission Update Fail!' );
        }
    }

}