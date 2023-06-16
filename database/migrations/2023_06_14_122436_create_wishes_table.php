<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishesTable extends Migration
{
    public function up()
    {
        Schema::create('wishes', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('course_id')->constrained('courses');
            // Indexes
            $table->index('student_id');
            $table->index('course_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishes');
    }
}
