<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('student_id')->constrained('users');
            $table->string('title', 255);
            $table->text('body');
            // Indexes
            $table->index('course_id');
            $table->index('student_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
