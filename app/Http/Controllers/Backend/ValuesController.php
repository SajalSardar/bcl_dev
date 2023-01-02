<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Values;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ValuesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $values = Values::orderBy( 'id', 'desc' )->paginate( 20 );
        return view( 'backend.value.index', compact( 'values' ) );
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
            "title" => 'required|unique:values,title',
            "image" => 'required|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $image_name = Str::uuid() . '.' . $file->extension();
            $upload     = Image::make( $file )->crop( 250, 250 )->save( public_path( 'storage/value/' . $image_name ) );
        }

        if ( $upload ) {
            $success = Values::create( [
                "title"  => $request->title,
                "banner" => $image_name,
            ] );
            if ( $success ) {

                return back()->with( 'success', 'Values Store Successfully Done!' );
            } else {
                return back()->with( 'success', 'Values Store Failed!' );
            }
        } else {
            return back()->with( 'error', 'File not Uploading!' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Values  $values
     * @return \Illuminate\Http\Response
     */
    public function edit( Values $value ) {

        return view( 'backend.value.edit', compact( 'value' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Values  $values
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Values $value ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title" => 'required|unique:values,title,' . $value->id,
            "image" => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            if ( file_exists( public_path( 'storage/value/' . $value->banner ) ) ) {
                Storage::delete( 'product/' . $value->banner );
            }
            $image_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 250, 250 )->save( public_path( 'storage/value/' . $image_name ) );
        } else {
            $image_name = $value->banner;
        }

        $success = $value->update( [
            "title"  => $request->title,
            "banner" => $image_name,
        ] );
        if ( $success ) {

            return redirect()->route( 'dashboard.value.index' )->with( 'success', 'Values Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.value.index' )->with( 'success', 'Values Update Failed!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Values  $values
     * @return \Illuminate\Http\Response
     */
    public function destroy( Values $value ) {
        if ( file_exists( public_path( 'storage/value/' . $value->banner ) ) ) {
            Storage::delete( 'value/' . $value->banner );
        }
        $value->delete();
        return redirect()->route( 'dashboard.value.index' )->with( 'success', 'Values Delete Successfully Done!' );
    }

    /**
     * product Status Update.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function valueStatusUpdate( Values $value ) {

        if ( $value->status == 1 ) {
            $value->update( [
                'status' => 2,
            ] );
        } else {
            $value->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.value.index' )->with( 'success', 'Status Update Successfully Done!' );
    }
}