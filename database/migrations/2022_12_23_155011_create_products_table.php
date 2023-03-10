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
        Schema::create( 'products', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' );
            $table->foreignId( 'product_category_id' )->constrained()->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->string( 'slug' );
            $table->longText( 'description' )->nullable();
            $table->string( 'image' );
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
        Schema::dropIfExists( 'products' );
    }
};