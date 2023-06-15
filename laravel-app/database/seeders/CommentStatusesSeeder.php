<?php
use Illuminate\Database\Seeder;
use App\Models\CommentStatus;

class CommentStatusesSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    CommentStatus::create(['comment_id' => 1, 'type_id' => 1]);
    CommentStatus::create(['comment_id' => 2, 'type_id' => 2]);
    CommentStatus::create(['comment_id' => 3, 'type_id' => 1]);// Add more comment statuses here}
}
}