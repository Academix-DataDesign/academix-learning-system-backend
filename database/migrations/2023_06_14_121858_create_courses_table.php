<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('language_id')->constrained('languages');
            $table->foreignId('instructor_id')->constrained('users');
            $table->foreignId('level_id')->constrained('course_levels');
            $table->string('title', 255);
            $table->text('description');
            $table->string('thumbnail_path', 255)->default('thumbnail.png');
            $table->integer('duration');
            $table->integer('wishes')->default(0);
            $table->float('price')->nullable();
            $table->boolean('certification')->default(false);
            $table->boolean('bestseller')->default(false);
            // Indexes
            $table->index('category_id');
            $table->index('status_id');
            $table->index('language_id');
            $table->index('instructor_id');
            $table->index('level_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
