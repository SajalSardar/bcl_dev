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
        Schema::create( 'profiles', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' )->default( 'Bulid a Bright Future Fore Bangladesh' );
            $table->longText( 'description' )->nullable();
            $table->string( 'image' )->nullable();
            $table->string( 'profile' )->nullable();
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
        Schema::dropIfExists( 'profiles' );
    }
};