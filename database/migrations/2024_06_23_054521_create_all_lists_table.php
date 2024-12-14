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
        Schema::create('all_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('package_id')->nullable();
            $table->string('image');
            $table->string('thumbnail_image');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->text('website')->nullable();
            $table->text('fb')->nullable();
            $table->text('x_link')->nullable();
            $table->text('linkden')->nullable();
            $table->text('whatsapp')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->integer('views')->default(0);
            $table->string('file')->nullable();
            $table->text('google_map_embed_code')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('seo_title');
            $table->string('seo_description');
            $table->boolean('status');
            $table->boolean('is_approved')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('all_lists');
    }
};
