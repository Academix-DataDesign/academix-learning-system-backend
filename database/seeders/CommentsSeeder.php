<?php
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Status;

class CommentsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){$status1 = Status::find(1);$status2 = Status::find(2);

        Comment::create([
            'status_id' => $status1->id,
            'comment_text' => 'Great work on this project!'
        ]);

        Comment::create([
            'status_id' => $status2->id,
            'comment_text' => 'I have some suggestions for improvement.'
        ]);

        // Add more comments here
    }
}