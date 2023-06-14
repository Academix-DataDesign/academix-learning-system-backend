<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialsTable extends Migration
{
    public function up()
    {
        Schema::create('user_socials', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('social_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_socials');
    }
}
