<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRequirementsTable extends Migration
{
    public function up()
    {
        Schema::create('course_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->string('requirement_text', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_requirements');
    }
}
