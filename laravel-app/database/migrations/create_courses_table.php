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
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('language_id')->constrained('languages');
            $table->foreignId('instructor_id')->constrained('users');
            $table->foreignId('level_id')->constrained('course_levels');
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail_path')->default('thumbnail.png');
            $table->float('duration');
            $table->integer('wishes')->default(0);
            $table->float('price')->nullable();
            $table->boolean('certification')->default(false);
            $table->boolean('bestseller')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
