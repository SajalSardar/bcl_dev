<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $employee = Employee::firstOrfail();
        return view( 'backend.sections.employee', compact( 'employee' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Employee $employee ) {
        $file = $request->file( 'image' );
        $request->validate( [
            "title"       => 'required',
            "description" => 'required',
            "image"       => 'nullable|image|mimes:png,jpg|max:1024',
        ] );

        if ( $file ) {
            $image_name = Str::uuid() . '.' . $file->extension();
            if ( file_exists( public_path( 'storage/employee/' . $employee->image ) ) && $employee->image !== NULL ) {
                Storage::delete( 'employee/' . $employee->image );
            }
            $upload = Image::make( $file )->crop( 650, 500 )->save( public_path( 'storage/employee/' . $image_name ) );

        } else {
            $image_name = $employee->image;
        }

        $update = $employee->update( [
            "title"       => $request->title,
            "description" => $request->description,
            "image"       => $image_name,
        ] );

        if ( $update ) {
            return back()->with( 'success', 'Home Employee Update Successfully Done!' );
        } else {
            return back()->with( 'success', 'Home Employee Update Fail!' );
        }
    }

}