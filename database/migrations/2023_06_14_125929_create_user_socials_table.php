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
            // Constraints
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('social_id')->constrained('socials');
            // Unique constraint
            $table->unique(['user_id', 'social_id']);
            // Indexes
            $table->index('user_id');
            $table->index('social_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_socials');
    }
}
