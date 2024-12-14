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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('/default/default.png');
            $table->string('banner')->default('/default/banner.png');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('about')->nullable();
            $table->text('website')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('fb')->nullable();
            $table->text('insta')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkden')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type',['user','admin'])->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
