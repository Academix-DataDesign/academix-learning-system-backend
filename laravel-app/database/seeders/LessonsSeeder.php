<?php
use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    Lesson::create(['title' => 'Lesson 1', 'path' => 'lesson1.mp4']);
    Lesson::create(['title' => 'Lesson 2', 'path' => 'lesson2.mp4']);
    Lesson::create(['title' => 'Lesson 3', 'path' => 'lesson3.mp4']);// Add more lessons here}
}
}