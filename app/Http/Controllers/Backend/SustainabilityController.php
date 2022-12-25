<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sustainability;
use Illuminate\Http\Request;

class SustainabilityController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'backend.sustainability.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sustainability  $sustainability
     * @return \Illuminate\Http\Response
     */
    public function show( Sustainability $sustainability ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sustainability  $sustainability
     * @return \Illuminate\Http\Response
     */
    public function edit( Sustainability $sustainability ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sustainability  $sustainability
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Sustainability $sustainability ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sustainability  $sustainability
     * @return \Illuminate\Http\Response
     */
    public function destroy( Sustainability $sustainability ) {
        //
    }
}
