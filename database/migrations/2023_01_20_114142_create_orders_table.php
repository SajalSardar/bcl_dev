<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'orders', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained()->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->string( 'art_po' )->unique();
            $table->date( 'po_recv_date' )->nullable();
            $table->string( 'color' )->nullable();
            $table->string( 'style' )->nullable();
            $table->integer( 'quantity' );
            $table->string( 'fabrication' )->nullable();
            $table->string( 'sc_so_fr_status' )->nullable();
            $table->string( 'bom_create' )->nullable();
            $table->string( 'fabric_sourcing_country' )->nullable();
            $table->date( 'yarn_booking_date' )->nullable();
            $table->date( 'yarn_receive_date' )->nullable();
            $table->date( 'dying_start_date' )->nullable();
            $table->date( 'dying_finishing_date' )->nullable();
            $table->date( 'fabric_booking_date' )->nullable();
            $table->date( 'pp_submite_date' )->nullable();
            $table->string( 'pp_approval_status' )->nullable();
            $table->string( 'lab_test_sent' )->nullable();
            $table->string( 'lab_test_aprvd' )->nullable();
            $table->string( 'color_continuity' )->nullable();
            $table->string( 'its_sgs' )->nullable();
            $table->date( 'fabric_etd' )->nullable();
            $table->date( 'fabric_eta' )->nullable();

            $table->date( 'label_tab_booking' )->nullable();
            $table->date( 'label_tab_in_house' )->nullable();
            $table->date( 'care_booking' )->nullable();
            $table->date( 'care_in_house' )->nullable();
            $table->string( 'approved_layout' )->nullable();
            $table->date( 'button_booking' )->nullable();
            $table->date( 'button_in_house' )->nullable();
            $table->date( 'sewing_booking' )->nullable();
            $table->date( 'sewing_in_house' )->nullable();
            $table->date( 'neck_booking' )->nullable();
            $table->date( 'neck_in_house' )->nullable();
            $table->date( 'metal_booking' )->nullable();
            $table->date( 'metal_in_house' )->nullable();
            $table->date( 'zipper_booking' )->nullable();
            $table->date( 'zipper_in_house' )->nullable();
            $table->date( 'sticker_booking' )->nullable();
            $table->date( 'sticker_in_house' )->nullable();
            $table->date( 'poly_booking' )->nullable();
            $table->date( 'poly_in_house' )->nullable();
            $table->date( 'carton_booking' )->nullable();
            $table->date( 'carton_in_house' )->nullable();
            $table->longText( 'other_accessories' )->nullable();

            $table->date( 'print_str' )->nullable();
            $table->date( 'print_str_approved' )->nullable();
            $table->date( 'embr_str' )->nullable();
            $table->date( 'embr_str_approved' )->nullable();
            $table->date( 'accessories_in_house' )->nullable();
            $table->string( 'accessories_report' )->nullable();
            $table->date( 'fabric' )->nullable();
            $table->date( 'red_seal_sample' )->nullable();
            $table->date( 'pp_meeting' )->nullable();
            $table->date( 'input_date' )->nullable();
            $table->date( 'production_update' )->nullable();
            $table->date( 'ins_date' )->nullable();
            $table->longText( 'remarks' )->nullable();
            $table->date( 'black_seal_sample' )->nullable();
            $table->date( 'wash_app' )->nullable();
            $table->date( 'shipping_sample_sent' )->nullable();
            $table->date( 'black_seal_approved' )->nullable();

            $table->integer( 'status' )->default( 1 );
            $table->softDeletes();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'orders' );
    }
};