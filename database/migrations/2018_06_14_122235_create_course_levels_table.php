<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('course_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_name', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_levels');
    }
}
