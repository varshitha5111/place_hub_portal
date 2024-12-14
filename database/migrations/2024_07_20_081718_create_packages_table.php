<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['free','paid']);
            $table->string('name');
            $table->double('price');
            $table->integer('number_of_days');
            $table->integer('no_of_listing');
            $table->integer('no_of_photos');
            $table->integer('no_of_video');
            $table->integer('no_of_amentities');
            $table->integer('no_of_featured_listing');
            $table->boolean('show_at_home');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
