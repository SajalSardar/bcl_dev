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
}