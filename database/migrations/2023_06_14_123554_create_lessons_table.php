<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('path', 255);
            $table->text('content')->nullable();
            // Constraints
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('video_id')->constrained('videos');
            // Indexes
            $table->index('section_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
