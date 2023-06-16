<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamps();
        });

        // Insert default user types
        $types = [
            ['name' => 'Admin'],
            ['name' => 'Instructor'],
            ['name' => 'Learner'],
        ];

        DB::table('types')->insert($types);
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}
