<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('instructor_courses', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('instructor_id')->constrained('users');
            $table->foreignId('course_id')->constrained('courses');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instructor_courses');
    }
}
