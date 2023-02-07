<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories  = ProductCategory::all();
        $products    = Product::orderBy( 'id', 'desc' )->paginate( 30 );
        $page_header = PageBanner::where( 'page', 'product' )->firstOrFail();
        return view( 'backend.product.index', compact( 'categories', 'products', 'page_header' ) );
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
            "title"       => 'required',
            "description" => 'nullable',
            "category_id" => 'required',
            "image"       => 'required|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $image_name = Str::uuid() . '.' . $file->extension();
            $upload     = Image::make( $file )->crop( 800, 1000 )->save( public_path( 'storage/product/' . $image_name ) );
        }

        if ( $upload ) {
            $success = Product::create( [
                "title"               => $request->title,
                "slug"                => Str::slug( $request->title ),
                "product_category_id" => $request->category_id,
                "description"         => $request->description,
                "image"               => $image_name,
            ] );
            if ( $success ) {

                return back()->with( 'success', 'Product Insert Successfully Done!' );
            } else {
                return back()->with( 'success', 'Product Insert Failed!' );
            }
        } else {
            return back()->with( 'error', 'File not Uploading!' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( Product $product ) {
        $categories = ProductCategory::all();
        return view( 'backend.product.edit', compact( 'product', 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Product $product ) {
        $file = $request->file( 'image' );

        $request->validate( [
            "title"       => 'required',
            "description" => 'nullable',
            "category_id" => 'required',
            "image"       => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            if ( file_exists( public_path( 'storage/product/' . $product->image ) ) ) {
                Storage::delete( 'product/' . $product->image );
            }
            $image_name = Str::uuid() . '.' . $file->extension();
            $upload     = Image::make( $file )->crop( 500, 500 )->save( public_path( 'storage/product/' . $image_name ) );
        } else {
            $image_name = $product->image;
        }

        $success = $product->update( [
            "title"       => $request->title,
            'slug'        => Str::slug( $request->title ),
            "description" => $request->description,
            "image"       => $image_name,
        ] );
        if ( $success ) {

            return redirect()->route( 'dashboard.product.index' )->with( 'success', 'Product Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.product.index' )->with( 'success', 'Product Update Failed!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( Product $product ) {
        if ( file_exists( public_path( 'storage/product/' . $product->image ) ) ) {
            Storage::delete( 'product/' . $product->image );
        }
        $success = $product->delete();
        if ( $success ) {

            return redirect()->route( 'dashboard.product.index' )->with( 'success', 'Product Delete Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.product.index' )->with( 'success', 'Product Delete Failed!' );
        }
    }

    /**
     * product Status Update.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productStatusUpdate( Product $product ) {

        if ( $product->status == 1 ) {
            $product->update( [
                'status' => 2,
            ] );
        } else {
            $product->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.product.index' )->with( 'success', 'Status Update Successfully Done!' );
    }

    public function productPageHeader( Request $request, $id ) {
        $file        = $request->file( 'header_banner' );
        $page_header = PageBanner::where( 'id', $id )->firstOrFail();

        $request->validate( [
            "header_banner" => 'nullable|max:512|mimes:png,jpg,webp',
        ] );

        if ( $file ) {
            $banner_name = Str::uuid() . '.' . $file->extension();
            Image::make( $file )->crop( 1700, 500 )->save( public_path( 'storage/uploads/' . $banner_name ) );
        } else {
            $banner_name = $page_header->banner;
        }

        $update = $page_header->update( [
            "banner" => $banner_name,
        ] );

        if ( $update ) {
            return back()->with( 'success', 'Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Update Fail!' );
        }
    }
}