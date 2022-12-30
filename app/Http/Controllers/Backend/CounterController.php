<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $counters = Counter::orderBy( 'id', 'desc' )->paginate( 20 );
        return view( 'backend.counter.index', compact( 'counters' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            "title"  => 'required|unique:counters,title',
            "number" => 'required|integer',
            "icon"   => 'required',
        ] );

        $success = Counter::create( [
            "title"  => $request->title,
            "number" => $request->number,
            "icon"   => $request->icon,
        ] );
        if ( $success ) {
            return back()->with( 'success', 'Counter Insert Successfully Done!' );
        } else {
            return back()->with( 'success', 'Counter Insert Failed!' );
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit( Counter $counter ) {
        return view( 'backend.counter.edit', compact( 'counter' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Counter $counter ) {
        $request->validate( [
            "title"  => 'required|unique:counters,title,' . $counter->id,
            "number" => 'required|integer',
            "icon"   => 'required',
        ] );

        $success = $counter->update( [
            "title"  => $request->title,
            "number" => $request->number,
            "icon"   => $request->icon,
        ] );
        if ( $success ) {
            return redirect()->route( 'dashboard.counter.index' )->with( 'success', 'Counter Insert Successfully Done!' );
        } else {
            return redirect()->route( 'dashboard.counter.index' )->with( 'success', 'Counter Insert Failed!' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy( Counter $counter ) {
        $counter->delete();
        return redirect()->route( 'dashboard.counter.index' )->with( 'success', 'Counter Delete Successfully Done!' );
    }

    /**
     * counter Status Update.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function counterStatusUpdate( Counter $counter ) {

        if ( $counter->status == 1 ) {
            $counter->update( [
                'status' => 2,
            ] );
        } else {
            $counter->update( [
                'status' => 1,
            ] );
        }
        return redirect()->route( 'dashboard.counter.index' )->with( 'success', ' Status Update Successfully Done!' );
    }
}