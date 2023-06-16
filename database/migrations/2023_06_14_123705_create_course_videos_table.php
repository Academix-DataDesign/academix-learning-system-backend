<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseVideosTable extends Migration
{
    public function up()
    {
        Schema::create('course_videos', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('video_id')->constrained('lessons');
            // Indexes
            $table->index('course_id');
            $table->index('video_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_videos');
    }
}
