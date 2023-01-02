<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companies = Company::orderBy( 'id', 'desc' )->paginate( 20 );
        return view( 'backend.company.index', compact( 'companies' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $file        = $request->file( 'banner_image' );
        $icon        = $request->file( 'icon' );
        $banner_name = null;

        $request->validate( [
            "title"        => 'required|unique:companies,title',
            "description"  => 'required',
            "icon"         => 'required|max:512|mimes:png,jpg,webp',
            "banner_image" => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $icon ) {
            $icon_name = Str::uuid() . '.' . $icon->extension();
            $upload    = Image::make( $icon )->resize( 65, 65 )->save( public_path( 'storage/company/' . $icon_name ) );
        }
        if ( $file ) {
            $banner_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 1000, 600 )->save( public_path( 'storage/company/' . $banner_name ) );
        }

        if ( $upload ) {
            $success = Company::create( [
                "title"       => $request->title,
                "slug"        => Str::slug( $request->title ),
                "description" => $request->description,
                "icon"        => $icon_name,
                "banner"      => $banner_name,
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
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit( Company $company ) {
        return view( 'backend.company.edit', compact( 'company' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Company $company ) {
        $file = $request->file( 'banner_image' );
        $icon = $request->file( 'icon' );

        $request->validate( [
            "title"        => 'required|unique:companies,title,' . $company->id,
            "description"  => 'required',
            "icon"         => 'nullable|max:512|mimes:png,jpg,webp',
            "banner_image" => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $icon ) {
            if ( file_exists( public_path( 'storage/company/' . $company->icon ) ) ) {
                Storage::delete( 'company/' . $company->icon );
            }
            $icon_name = Str::uuid() . '.' . $icon->extension();
            Image::make( $icon )->resize( 65, 65 )->save( public_path( 'storage/company/' . $icon_name ) );
        } else {
            $icon_name = $company->icon;
        }
        $banner_name = null;
        if ( $file ) {
            if ( file_exists( public_path( 'storage/company/' . $company->banner ) ) ) {
                Storage::delete( 'company/' . $company->banner );
            }
            $banner_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 1000, 600 )->save( public_path( 'storage/company/' . $banner_name ) );
        } else {
            $banner_name = $company->banner;
        }

        $success = $company->update( [
            "title"       => $request->title,
            "slug"        => Str::slug( $request->title ),
            "description" => $request->description,
            "icon"        => $icon_name,
            "banner"      => $banner_name,
        ] );
        if ( $success ) {
            return redirect()->route( 'dashboard.company.index' )->with( 'success', 'Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.company.index' )->with( 'success', 'Update failed!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy( Company $company ) {
        if ( file_exists( public_path( 'storage/company/' . $company->icon ) ) ) {
            Storage::delete( 'company/' . $company->icon );
        }
        if ( file_exists( public_path( 'storage/company/' . $company->banner ) ) ) {
            Storage::delete( 'company/' . $company->banner );
        }
        $success = $company->delete();
        if ( $success ) {
            return redirect()->route( 'dashboard.company.index' )->with( 'success', ' Delete Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.company.index' )->with( 'success', ' Delete failed!' );
        }
    }

    /**
     * company Status Update.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function companyStatusUpdate( Company $company ) {

        if ( $company->status == 1 ) {
            $company->update( [
                'status' => 2,
            ] );
        } else {
            $company->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.company.index' )->with( 'success', ' Status Update Successfully Done!' );
    }
}