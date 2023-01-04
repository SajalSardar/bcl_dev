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
        Schema::create( 'theme_options', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'header_number' )->default( '123456789' );
            $table->string( 'logo' )->default( 'logo.png' );
            $table->string( 'footer_one_title' )->nullable();
            $table->text( 'footer_one' )->nullable();
            $table->string( 'footer_two_title' )->nullable();
            $table->text( 'footer_two' )->nullable();
            $table->string( 'footer_three_title' )->nullable();
            $table->text( 'footer_three' )->nullable();
            $table->string( 'footer_four_title' )->nullable();
            $table->text( 'footer_four' )->nullable();
            $table->text( 'bottom_footer' )->nullable();
            $table->string( 'company_section_title' )->default( 'Our Company' );
            $table->text( 'company_section_description' )->nullable();
            $table->string( 'sustainability_section_title' )->default( 'Our Sustainability' );
            $table->text( 'sustainability_section_description' )->nullable();
            $table->string( 'value_section_title' )->default( 'Our Values' );
            $table->text( 'value_section_description' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'theme_options' );
    }
};