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
        Schema::create('amentity_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_id')->constrained('all_lists')->onDelete('cascade');
            $table->foreignId('amentity_id')->constrained('amentities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amentity_lists');
    }
};
