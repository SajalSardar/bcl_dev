<?php

namespace App\Http\Controllers\Backend;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends Controller {

    public function index( Request $request ) {

        $searchString = $request->art_po_no;

        if ( $searchString != null ) {

            $orders = Order::with( 'user' )
                ->where( 'art_po', 'LIKE', "%{$searchString}%" )
                ->select( 'art_po', 'quantity', 'user_id', 'id', 'status', 'deleted_at' )
                ->withTrashed()
                ->orderBy( 'id', 'desc' )
                ->paginate( 30 )->withQueryString();

            return view( 'backend.order.search', compact( 'orders' ) );
        } else {
            $orders            = Order::selectquery( 1 )->paginate( 30 );
            $compleated_orders = Order::selectquery( 3 )->paginate( 30 );
            $deactive_orders   = Order::selectquery( 2 )->paginate( 30 );
            $trash_orders      = Order::onlyTrashed()
                ->with( 'user' )->select( 'art_po', 'quantity', 'user_id', 'id', 'status' )
                ->orderBy( 'id', 'desc' )->paginate( 30 );
            return view( 'backend.order.index', compact( 'orders', 'compleated_orders', 'deactive_orders', 'trash_orders' ) );
        }

    }

    public function clientOrder( Request $request ) {

        $searchString = $request->art_po_no;

        if ( $searchString != null ) {

            $orders = Order::with( 'user' )
                ->where( 'user_id', auth()->user()->id )
                ->where( 'art_po', 'LIKE', "%{$searchString}%" )
                ->select( 'art_po', 'quantity', 'user_id', 'id', 'status', 'deleted_at' )
                ->withTrashed()
                ->orderBy( 'id', 'desc' )
                ->paginate( 30 )->withQueryString();

            return view( 'backend.order.userorder', compact( 'orders' ) );
        } else {
            $orders = Order::with( 'user' )
                ->where( 'user_id', auth()->user()->id )
                ->select( 'art_po', 'quantity', 'user_id', 'id', 'status', 'deleted_at' )
                ->withTrashed()
                ->orderBy( 'status', 'asc' )->paginate( 30 );
            return view( 'backend.order.userorder', compact( 'orders' ) );
        }

    }

    public function create() {
        $users = User::where( 'role', 'client' )->get( ['id', 'name'] );
        return view( 'backend.order.create', compact( 'users' ) );
    }

    public function store( Request $request ) {

        $approved_layout    = $request->file( 'approved_layout' );
        $accessories_report = $request->file( 'accessories_report' );
        $request->validate( [
            "client"             => 'required',
            "art_po"             => 'required',
            "quantity"           => 'required',
            "approved_layout"    => 'nullable|mimes:png,jpg,docx,doc,xlsx,csv',
            "accessories_report" => 'nullable|mimes:png,jpg,docx,doc,xlsx,csv',

        ] );

        if ( $approved_layout ) {
            $approved_layout_name = Str::uuid() . '.' . $approved_layout->extension();
            Storage::putFileAs( 'order/', $approved_layout, $approved_layout_name );
        } else {
            $approved_layout_name = null;
        }
        if ( $accessories_report ) {
            $accessories_report_name = Str::uuid() . '.' . $accessories_report->extension();
            Storage::putFileAs( 'order/', $accessories_report, $accessories_report_name );
        } else {
            $accessories_report_name = null;
        }

        $result = Order::create( [
            "user_id"                 => $request->client,
            "art_po"                  => $request->art_po,
            "po_recv_date"            => $request->po_recv_date,
            "color"                   => $request->color,
            "style"                   => $request->style,
            "quantity"                => $request->quantity,
            "fabrication"             => $request->fabrication,
            "label_tab_booking"       => $request->label_tab_booking,
            "label_tab_in_house"      => $request->label_tab_in_house,
            "care_booking"            => $request->care_booking,
            "care_in_house"           => $request->care_in_house,
            "button_booking"          => $request->button_booking,
            "button_in_house"         => $request->button_in_house,
            "sewing_booking"          => $request->sewing_booking,
            "sewing_in_house"         => $request->sewing_in_house,
            "neck_booking"            => $request->neck_booking,
            "neck_in_house"           => $request->neck_in_house,
            "metal_booking"           => $request->metal_booking,
            "metal_in_house"          => $request->metal_in_house,
            "zipper_booking"          => $request->zipper_booking,
            "zipper_in_house"         => $request->zipper_in_house,
            "sticker_booking"         => $request->sticker_booking,
            "sticker_in_house"        => $request->sticker_in_house,
            "poly_booking"            => $request->poly_booking,
            "poly_in_house"           => $request->poly_in_house,
            "carton_booking"          => $request->carton_booking,
            "carton_in_house"         => $request->carton_in_house,
            "other_accessories"       => $request->other_accessories,
            "sc_so_fr_status"         => $request->sc_so_fr_status,
            "bom_create"              => $request->bom_create,
            "fabric_sourcing_country" => $request->fabric_sourcing_country,
            "yarn_booking_date"       => $request->yarn_booking_date,
            "yarn_receive_date"       => $request->yarn_receive_date,
            "dying_start_date"        => $request->dying_start_date,
            "dying_finishing_date"    => $request->dying_finishing_date,
            "fabric_booking_date"     => $request->fabric_booking_date,
            "pp_submite_date"         => $request->pp_submite_date,
            "pp_approval_status"      => $request->pp_approval_status,
            "lab_test_sent"           => $request->lab_test_sent,
            "lab_test_aprvd"          => $request->lab_test_aprvd,
            "color_continuity"        => $request->color_continuity,
            "its_sgs"                 => $request->its_sgs,
            "fabric_etd"              => $request->fabric_etd,
            "fabric_eta"              => $request->fabric_eta,
            "print_str"               => $request->print_str,
            "print_str_approved"      => $request->print_str_approved,
            "embr_str"                => $request->embr_str,
            "embr_str_approved"       => $request->embr_str_approved,
            "accessories_in_house"    => $request->accessories_in_house,
            "fabric"                  => $request->fabric,
            "pp_meeting"              => $request->pp_meeting,
            "input_date"              => $request->input_date,
            "production_update"       => $request->production_update,
            "ins_date"                => $request->ins_date,
            "remarks"                 => $request->remarks,
            "black_seal_sample"       => $request->black_seal_sample,
            "wash_app"                => $request->wash_app,
            "shipping_sample_sent"    => $request->shipping_sample_sent,
            "black_seal_approved"     => $request->black_seal_approved,
            "approved_layout"         => $approved_layout_name,
            "accessories_report"      => $accessories_report_name,
            "red_seal_sample"         => $request->red_seal_sample,
        ] );
        if ( $result ) {
            return redirect()->route( 'dashboard.order.index' )->with( 'success', 'Order Successfully Created!' );
        } else {
            return back()->with( 'error', 'Order Not Created!' );
        }
    }

    public function show( Order $order ) {
        return view( 'backend.order.show', compact( 'order' ) );
    }

    public function edit( Order $order ) {
        $users = User::where( 'role', 'client' )->get( ['id', 'name'] );
        return view( 'backend.order.edit', compact( 'order', 'users' ) );
    }

    public function update( Order $order, Request $request ) {

        $approved_layout    = $request->file( 'approved_layout' );
        $accessories_report = $request->file( 'accessories_report' );
        $request->validate( [
            "client"             => 'required',
            "art_po"             => 'required|unique:orders,art_po,' . $order->id,
            "quantity"           => 'required',
            "approved_layout"    => 'nullable|mimes:png,jpg,docx,doc,xlsx,csv',
            "accessories_report" => 'nullable|mimes:png,jpg,docx,doc,xlsx,csv',

        ] );

        if ( $approved_layout ) {
            if ( file_exists( public_path( 'storage/order/' . $order->approved_layout ) ) ) {
                Storage::delete( 'order/' . $order->approved_layout );
            }
            $approved_layout_name = Str::uuid() . '.' . $approved_layout->extension();
            Storage::putFileAs( 'order/', $approved_layout, $approved_layout_name );
        } else {
            $approved_layout_name = $order->approved_layout;
        }

        if ( $accessories_report ) {

            if ( file_exists( public_path( 'storage/order/' . $order->accessories_report ) ) ) {
                Storage::delete( 'order/' . $order->accessories_report );
            }

            $accessories_report_name = Str::uuid() . '.' . $accessories_report->extension();
            Storage::putFileAs( 'order/', $accessories_report, $accessories_report_name );
        } else {
            $accessories_report_name = $order->accessories_report;
        }

        $result = $order->update( [
            "user_id"                 => $request->client,
            "art_po"                  => $request->art_po,
            "po_recv_date"            => $request->po_recv_date,
            "color"                   => $request->color,
            "style"                   => $request->style,
            "quantity"                => $request->quantity,
            "fabrication"             => $request->fabrication,
            "label_tab_booking"       => $request->label_tab_booking,
            "label_tab_in_house"      => $request->label_tab_in_house,
            "care_booking"            => $request->care_booking,
            "care_in_house"           => $request->care_in_house,
            "button_booking"          => $request->button_booking,
            "button_in_house"         => $request->button_in_house,
            "sewing_booking"          => $request->sewing_booking,
            "sewing_in_house"         => $request->sewing_in_house,
            "neck_booking"            => $request->neck_booking,
            "neck_in_house"           => $request->neck_in_house,
            "metal_booking"           => $request->metal_booking,
            "metal_in_house"          => $request->metal_in_house,
            "zipper_booking"          => $request->zipper_booking,
            "zipper_in_house"         => $request->zipper_in_house,
            "sticker_booking"         => $request->sticker_booking,
            "sticker_in_house"        => $request->sticker_in_house,
            "poly_booking"            => $request->poly_booking,
            "poly_in_house"           => $request->poly_in_house,
            "carton_booking"          => $request->carton_booking,
            "carton_in_house"         => $request->carton_in_house,
            "other_accessories"       => $request->other_accessories,
            "sc_so_fr_status"         => $request->sc_so_fr_status,
            "bom_create"              => $request->bom_create,
            "fabric_sourcing_country" => $request->fabric_sourcing_country,
            "yarn_booking_date"       => $request->yarn_booking_date,
            "yarn_receive_date"       => $request->yarn_receive_date,
            "dying_start_date"        => $request->dying_start_date,
            "dying_finishing_date"    => $request->dying_finishing_date,
            "fabric_booking_date"     => $request->fabric_booking_date,
            "pp_submite_date"         => $request->pp_submite_date,
            "pp_approval_status"      => $request->pp_approval_status,
            "lab_test_sent"           => $request->lab_test_sent,
            "lab_test_aprvd"          => $request->lab_test_aprvd,
            "color_continuity"        => $request->color_continuity,
            "its_sgs"                 => $request->its_sgs,
            "fabric_etd"              => $request->fabric_etd,
            "fabric_eta"              => $request->fabric_eta,
            "print_str"               => $request->print_str,
            "print_str_approved"      => $request->print_str_approved,
            "embr_str"                => $request->embr_str,
            "embr_str_approved"       => $request->embr_str_approved,
            "accessories_in_house"    => $request->accessories_in_house,
            "fabric"                  => $request->fabric,
            "pp_meeting"              => $request->pp_meeting,
            "input_date"              => $request->input_date,
            "production_update"       => $request->production_update,
            "ins_date"                => $request->ins_date,
            "remarks"                 => $request->remarks,
            "black_seal_sample"       => $request->black_seal_sample,
            "wash_app"                => $request->wash_app,
            "shipping_sample_sent"    => $request->shipping_sample_sent,
            "black_seal_approved"     => $request->black_seal_approved,
            "approved_layout"         => $approved_layout_name,
            "accessories_report"      => $accessories_report_name,
            "red_seal_sample"         => $request->red_seal_sample,
        ] );
        if ( $result ) {
            return redirect()->route( 'dashboard.order.index' )->with( 'success', 'Order Update Successfull!' );
        } else {
            return back()->with( 'error', 'Order Not Updated!' );
        }
    }

    public function downloadOrder( Order $order ) {

        return ( new OrderExport( $order->id ) )->download( $order->art_po . '_order.xlsx' );
    }

    public function downloadAccessoriesReport( Order $order ) {

        return Storage::download( 'order/' . $order->accessories_report );
    }

    public function downloadApprovedLayout( Order $order ) {

        return Storage::download( 'order/' . $order->approved_layout );
    }

    public function statusUpdate( Order $order ) {

        if ( $order->status == 1 ) {
            $order->update( [
                "status" => 2,
            ] );
        } else {
            $order->update( [
                "status" => 1,
            ] );
        }
        return back()->with( 'success', 'Update Successfull!' );
    }

    public function runningDone( Order $order ) {

        if ( $order->status == 1 ) {
            $order->update( [
                "status" => 3,
            ] );
        } else {
            $order->update( [
                "status" => 1,
            ] );
        }
        return back()->with( 'success', 'Update Successfull!' );
    }

    public function deleteOrder( Order $order ) {
        $order->update( [
            "status" => 2,
        ] );
        $order->delete();
        return back()->with( 'success', 'Order Delete Successfull!' );
    }

    public function restore( $id ) {

        $order = Order::onlyTrashed()->find( $id );
        $order->update( [
            "status" => 1,
        ] );
        $order->restore();
        return back()->with( 'success', 'Order Restore Successfull!' );
    }

}