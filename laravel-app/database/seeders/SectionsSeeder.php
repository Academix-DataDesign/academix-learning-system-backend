<?php
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run(){
    Section::create(['course_id' => 1, 'title' => 'Introduction', 'content' => 'Course introduction goes here']);
    Section::create(['course_id' => 1, 'title' => 'Chapter 1', 'content' => 'Chapter 1 content goes here']);
    Section::create(['course_id' => 2, 'title' => 'Getting Started', 'content' => 'Getting started guide goes here']);// Add more sections here}
}



}