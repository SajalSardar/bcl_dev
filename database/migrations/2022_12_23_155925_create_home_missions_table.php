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
        Schema::create( 'home_missions', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'block_one_title' )->default( 'Mission' );
            $table->string( 'block_one_icon' )->default( 'fa-chess-queen' );
            $table->text( 'block_one_description' )->nullable();
            $table->string( 'block_two_title' )->default( 'Vissoin' );
            $table->string( 'block_two_icon' )->default( 'fa-chess-queen' );
            $table->text( 'block_two_description' )->nullable();
            $table->string( 'block_three_title' )->default( 'Stratgey' );
            $table->string( 'block_three_icon' )->default( 'fa-chess-queen' );
            $table->text( 'block_three_description' )->nullable();
            $table->string( 'image' )->nullable();
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
        Schema::dropIfExists( 'home_missions' );
    }
};