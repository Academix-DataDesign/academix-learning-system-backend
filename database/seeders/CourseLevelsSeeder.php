<?php
use Illuminate\Database\Seeder;
use App\Models\CourseLevel;

class CourseLevelsSeeder extends Seeder
{
    /**
     
Run the database seeds.*
@return void*/
public function run()
{
    CourseLevel::create(['level_name' => 'Beginner']);
    CourseLevel::create(['level_name' => 'Intermediate']);
    CourseLevel::create(['level_name' => 'Advanced']);
}
}