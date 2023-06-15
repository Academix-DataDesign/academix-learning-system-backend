<?php
use Illuminate\Database\Seeder;
use App\Models\CourseVideo;
use App\Models\Lesson;
use App\Models\Course;

class CourseVideosSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    $course1 = Course::find(1);$course2 = Course::find(2);
    $lesson1 = Lesson::create(['title' => 'Introduction', 'path' => 'lesson1.mp4']);
    $lesson2 = Lesson::create(['title' => 'Chapter 1', 'path' => 'lesson2.mp4']);
    $lesson3 = Lesson::create(['title' => 'Chapter 2', 'path' => 'lesson3.mp4']);
    $course1->videos()->create(['video_id' => $lesson1->id]);$course1->videos()->create(['video_id' => $lesson2->id]);
    $course2->videos()->create(['video_id' => $lesson3->id]);}
}