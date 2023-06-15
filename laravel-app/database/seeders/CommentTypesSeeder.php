<?php
use Illuminate\Database\Seeder;
use App\Models\CommentType;

class CommentTypesSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    CommentType::create(['type_name' => 'General']);
    CommentType::create(['type_name' => 'Feedback']);
    CommentType::create(['type_name' => 'Question']);// Add more comment types here}
}
}