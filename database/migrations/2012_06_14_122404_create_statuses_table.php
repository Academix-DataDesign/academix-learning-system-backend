<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            // Indexes
            $table->index('name');
            // Timestamps
            $table->timestamps();
        });

        DB::table('statuses')->insert([
            ['name' => 'inactive'],
            ['name' => 'active'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
