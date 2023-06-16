<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarksTable extends Migration
{
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('instructor_id')->constrained('users');
            // Unique constraint
            $table->unique(['student_id', 'instructor_id']);
            // Indexes
            $table->index('student_id');
            $table->index('instructor_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
