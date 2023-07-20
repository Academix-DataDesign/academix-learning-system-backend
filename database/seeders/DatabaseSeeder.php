<?php

use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Course,
    Wish,
    Enrollment,
    Notification,
    Section,
    Lesson,
    Report,
    Answer,
    Newsletter,
    UserSocial,
    Bookmark,
    CourseCurrency,
    CourseRequirement,
    InstructorCourse,
    Topic,
    Comment,
    Category,
    CourseLevel,
    Currency,
    Language,
    Release,
    Social,
    Status,
    Type,
    Video
};

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(20)->create();
        Course::factory()->count(5)->create();
        Wish::factory()->count(20)->create();
        Enrollment::factory()->count(20)->create();
        Notification::factory()->count(20)->create();
        Section::factory()->count(20)->create();
        Lesson::factory()->count(20)->create();
        Report::factory()->count(20)->create();
        Answer::factory()->count(20)->create();
        Newsletter::factory()->count(20)->create();
        UserSocial::factory()->count(20)->create();
        Bookmark::factory()->count(20)->create();
        CourseCurrency::factory()->count(20)->create();
        CourseRequirement::factory()->count(20)->create();
        InstructorCourse::factory()->count(20)->create();
        Topic::factory()->count(10)->create();
        Comment::factory()->count(20)->create();
        Category::factory()->count(20)->create();
        CourseLevel::factory()->count(20)->create();
        Currency::factory()->count(20)->create();
        Language::factory()->count(20)->create();
        Release::factory()->count(20)->create();
        Social::factory()->count(20)->create();
        Status::factory()->count(20)->create();
        Type::factory()->count(20)->create();
        Video::factory()->count(20)->create();
    }
}
