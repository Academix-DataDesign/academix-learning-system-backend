<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency_name', 255);
            // Indexes
            $table->index('currency_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
