<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;

class BackendController extends Controller {
    public function index() {
        $orders = Order::get( ['status'] );

        $client_orders = Order::where( 'user_id', auth()->user()->id )->get( ['status'] );
        return view( 'backend.index', compact( 'orders', 'client_orders' ) );
    }
}