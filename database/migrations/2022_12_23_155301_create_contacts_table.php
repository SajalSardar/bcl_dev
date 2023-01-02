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
        Schema::create( 'contacts', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'address_title' )->default( 'Our Address' );
            $table->string( 'address_icon' )->default( 'fas fa-map-location-dot' );
            $table->text( 'address' )->nullable();
            $table->string( 'email_title' )->default( 'Email' );
            $table->string( 'email_icon' )->default( 'fas fa-envelope' );
            $table->text( 'email' )->nullable();
            $table->string( 'call_title' )->default( 'Phone' );
            $table->string( 'call_icon' )->default( 'fas fa-phone' );
            $table->string( 'number' )->nullable();
            $table->text( 'map' )->nullable();
            $table->integer( 'status' )->default( 1 );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'contacts' );
    }
};