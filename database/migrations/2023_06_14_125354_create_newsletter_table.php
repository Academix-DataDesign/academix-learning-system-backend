<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsletterTable extends Migration
{
    public function up()
    {
        Schema::create('newsletter', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('student_id')->constrained('users');
            // Indexes
            $table->index('student_id');
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news2023_06_14_123743_create_reports_tableletter');
    }
}
