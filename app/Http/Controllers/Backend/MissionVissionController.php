<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MissionVission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MissionVissionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $datas = MissionVission::orderBy( 'id', 'desc' )->paginate( 20 );
        return view( 'backend.mission-vission.index', compact( 'datas' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title"       => 'required|unique:mission_vissions,title',
            "description" => 'required',
            "image"       => 'required|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $image_name = Str::uuid() . '.' . $file->extension();
            $upload     = Image::make( $file )->crop( 1200, 600 )->save( public_path( 'storage/about_page_block/' . $image_name ) );
        }

        if ( $upload ) {
            $success = MissionVission::create( [
                "title"       => $request->title,
                "slug"        => Str::slug( $request->title ),
                "description" => $request->description,
                "image"       => $image_name,
            ] );
            if ( $success ) {
                return back()->with( 'success', 'Insert Successfully Done!' );
            } else {
                return back()->with( 'success', 'Insert failed!' );
            }
        } else {
            return back()->with( 'error', 'File not Uploading!' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MissionVission  $missionVission
     * @return \Illuminate\Http\Response
     */
    public function edit( MissionVission $missionVission ) {
        return view( 'backend.mission-vission.edit', compact( 'missionVission' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MissionVission  $missionVission
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, MissionVission $missionVission ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title"       => 'required|unique:mission_vissions,title,' . $missionVission->id,
            "description" => 'required',
            "image"       => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            if ( file_exists( public_path( 'storage/about_page_block/' . $missionVission->image ) ) ) {
                Storage::delete( 'about_page_block/' . $missionVission->image );
            }
            $image_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 1200, 600 )->save( public_path( 'storage/about_page_block/' . $image_name ) );
        } else {
            $image_name = $missionVission->image;
        }

        $success = $missionVission->update( [
            "title"       => $request->title,
            "slug"        => Str::slug( $request->title ),
            "description" => $request->description,
            "image"       => $image_name,
        ] );
        if ( $success ) {
            return redirect()->route( 'dashboard.mission-vission.index' )->with( 'success', 'Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.mission-vission.index' )->with( 'error', 'Update failed!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MissionVission  $missionVission
     * @return \Illuminate\Http\Response
     */
    public function destroy( MissionVission $missionVission ) {
        if ( file_exists( public_path( 'storage/about_page_block/' . $missionVission->image ) ) ) {
            Storage::delete( 'about_page_block/' . $missionVission->image );
        }
        $success = $missionVission->delete();
        if ( $success ) {
            return redirect()->route( 'dashboard.mission-vission.index' )->with( 'success', ' Delete Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.mission-vission.index' )->with( 'success', ' Delete failed!' );
        }
    }

    /**
     * mission vission Status Update.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function mvStatusUpdate( MissionVission $missionVission ) {

        if ( $missionVission->status == 1 ) {
            $missionVission->update( [
                'status' => 2,
            ] );
        } else {
            $missionVission->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.mission-vission.index' )->with( 'success', ' Status Update Successfully Done!' );
    }
}