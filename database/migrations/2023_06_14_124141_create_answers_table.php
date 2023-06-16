<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('report_id')->constrained('reports');
            $table->foreignId('instructor_id')->constrained('users');
            $table->text('answer_body');
            // Indexes
            $table->index('report_id');
            $table->index('instructor_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
