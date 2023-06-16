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
            // Constraints
            $table->foreignId('course_id')->constrained('courses');
            $table->string('text', 255);
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_requirements');
    }
}