<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleasesTable extends Migration
{
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('instructor_id')->constrained('users');
            $table->string('release_title', 255);
            $table->string('link', 255);
            // Indexes
            $table->index('instructor_id');
            $table->dateTime('date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('releases');
    }
}
