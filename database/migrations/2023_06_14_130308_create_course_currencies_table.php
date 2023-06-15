<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('course_currencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('currency_id')->constrained('currencies');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_currencies');
    }
}
