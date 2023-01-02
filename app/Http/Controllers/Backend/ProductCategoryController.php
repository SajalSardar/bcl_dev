<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = ProductCategory::orderBy( 'id', 'desc' )->paginate( 10 );
        return view( 'backend.product.category.index', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required',
        ] );

        $success = ProductCategory::create( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );
        if ( $success ) {

            return back()->with( 'success', 'Category Create Successfully Done!' );
        } else {
            return back()->with( 'success', 'Category Create Failed!' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit( ProductCategory $productCategory ) {
        return view( 'backend.product.category.edit', compact( 'productCategory' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, ProductCategory $productCategory ) {
        $request->validate( [
            'name' => 'required',
        ] );

        $success = $productCategory->update( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name ),
        ] );
        if ( $success ) {

            return redirect()->route( 'dashboard.product-category.index' )->with( 'success', 'Category Update Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.product-category.index' )->with( 'success', 'Category Update Failed!' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( ProductCategory $productCategory ) {
        $productCategory->delete();
        return redirect()->route( 'dashboard.product-category.index' )->with( 'success', 'Category Delete Successfully Done!' );
    }
}