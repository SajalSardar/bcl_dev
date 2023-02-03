<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function scopeSelectQuery( $query, $status ) {
        $query->with( 'user' )->select( 'art_po', 'quantity', 'user_id', 'id', 'status' )->where( 'status', $status )->orderBy( 'id', 'desc' );
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "po_recv_date"         => 'date',
        "yarn_booking_date"    => 'date',
        "yarn_receive_date"    => 'date',
        "dying_start_date"     => 'date',
        "dying_finishing_date" => 'date',
        "fabric_booking_date"  => 'date',
        "pp_submite_date"      => 'date',
        "fabric_etd"           => 'date',
        "fabric_eta"           => 'date',
        "label_tab_booking"    => 'date',
        "label_tab_in_house"   => 'date',
        "care_booking"         => 'date',
        "care_in_house"        => 'date',
        "button_booking"       => 'date',
        "button_in_house"      => 'date',
        "sewing_booking"       => 'date',
        "sewing_in_house"      => 'date',
        "neck_booking"         => 'date',
        "neck_in_house"        => 'date',
        "metal_booking"        => 'date',
        "metal_in_house"       => 'date',
        "zipper_booking"       => 'date',
        "zipper_in_house"      => 'date',
        "sticker_booking"      => 'date',
        "sticker_in_house"     => 'date',
        "poly_booking"         => 'date',
        "poly_in_house"        => 'date',
        "carton_booking"       => 'date',
        "carton_in_house"      => 'date',
        "print_str"            => 'date',
        "print_str_approved"   => 'date',
        "embr_str"             => 'date',
        "embr_str_approved"    => 'date',
        "accessories_in_house" => 'date',
        "fabric"               => 'date',
        "red_seal_sample"      => 'date',
        "pp_meeting"           => 'date',
        "input_date"           => 'date',
        "production_update"    => 'date',
        "ins_date"             => 'date',
        "black_seal_sample"    => 'date',
        "wash_app"             => 'date',
        "shipping_sample_sent" => 'date',
        "black_seal_approved"  => 'date',
    ];
}