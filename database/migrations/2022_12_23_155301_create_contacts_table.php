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
            $table->string( 'address_title' );
            $table->string( 'address_icon' );
            $table->text( 'address' );
            $table->string( 'email_title' );
            $table->string( 'email_icon' );
            $table->text( 'email' );
            $table->string( 'call_title' );
            $table->string( 'call_icon' );
            $table->string( 'number' );
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