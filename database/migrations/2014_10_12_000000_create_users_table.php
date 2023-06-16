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
            // Constraints
            $table->foreignId('type_id')->default(3)->constrained('types');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('avatar', 255)->default('avatar.png');
            $table->string('license', 255)->nullable();
            $table->text('bio')->nullable();
            $table->string('town', 255);
            $table->string('country', 255);
            $table->string('short_bio', 255)->default('Lorem ipsum');
            // Indexes
            $table->index('email');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
