<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Constraints
            $table->foreignId('type_id')->default(3)->constrained('types');
            $table->string('name', 255);
            $table->string('last_name', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('avatar', 255)->default('avatar.png');
            $table->string('license', 255)->nullable();
            $table->text('bio')->nullable();
            $table->string('town', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('short_bio', 255)->default('Lorem ipsum');
            // Indexes
            $table->index('email');
            // Timestamps
            $table->timestamps();
        });

        DB::table('users')->insert([
            'type_id' => 3,
            'name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("nekalozinka"),
            'town' => 'Podgorica',
            'country' => 'Montenegro',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
