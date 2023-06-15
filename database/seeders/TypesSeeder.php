<?php
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run()
{
    Type::create(['type_name' => 'admin']);
    Type::create(['type_name' => 'instructor']);
    Type::create(['type_name' => 'student']);}
}