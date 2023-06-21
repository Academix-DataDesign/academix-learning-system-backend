<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Wish;
use App\Models\Enrollment;
use App\Models\Notification;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Report;
use App\Models\Answer;
use App\Models\Newsletter;
use App\Models\UserSocial;
use App\Models\Bookmark;
use App\Models\CourseCurrency;
use App\Models\CourseRequirement;
use App\Models\InstructorCourse;
use App\Models\Topic;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
        Course::factory()->count(5)->create();
        Wish::factory()->count(20)->create();
        Enrollment::factory()->count(50)->create();
        Notification::factory()->count(100)->create();
        Section::factory()->count(20)->create();
        Lesson::factory()->count(100)->create();
        Report::factory()->count(50)->create();
        Answer::factory()->count(100)->create();
        Newsletter::factory()->count(50)->create();
        UserSocial::factory()->count(30)->create();
        Bookmark::factory()->count(100)->create();
        CourseCurrency::factory()->count(20)->create();
        CourseRequirement::factory()->count(30)->create();
        InstructorCourse::factory()->count(30)->create();
        Topic::factory()->count(10)->create();
        Comment::factory()->count(200)->create();
    }
}
