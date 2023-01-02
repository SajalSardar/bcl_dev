<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller {

    public function index() {
        $users = User::orderBy( 'id', 'desc' )->paginate( 30 );
        return view( 'backend.user.index', compact( 'users' ) );
    }

    public function create() {
        return view( 'backend.user.create' );
    }

    public function store( Request $request ) {
        $request->validate( [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ] );

        $user = User::create( [
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make( $request->password ),
            'email_verified_at' => Carbon::now(),
        ] );

        if ( $user ) {
            return back()->with( 'success', 'User Create Successfull!' );
        } else {
            return back()->with( 'error', 'User Create Failed!' );
        }
    }
}