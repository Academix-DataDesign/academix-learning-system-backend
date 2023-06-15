<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->default(3);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('avatar.png');
            $table->string('license')->nullable();
            $table->text('bio')->nullable();
            $table->string('town');
            $table->string('country');
            $table->string('short_bio')->default('Lorem ipsum');
            $table->foreign('user_socials')->references('id')->on('types');
            $table->foreign('type_id')->references('id')->on('usersocial');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
