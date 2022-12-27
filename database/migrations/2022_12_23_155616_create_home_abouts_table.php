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
        Schema::create( 'home_abouts', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' )->default( 'About Barisons Creations Ltd' );
            $table->longText( 'description' )->nullable();
            $table->string( 'year' )->default( '20' );
            $table->string( 'year_bottom_title' )->default( 'YEARS SINCE INCEPTION' );
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
        Schema::dropIfExists( 'home_abouts' );
    }
};