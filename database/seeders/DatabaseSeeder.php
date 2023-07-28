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
        User::factory()->count(5)->create();
        // Course::factory()->count(5)->create();
        // Wish::factory()->count(5)->create();
        // Enrollment::factory()->count(5)->create();
        // Notification::factory()->count(5)->create();
        // Section::factory()->count(5)->create();
        // Lesson::factory()->count(5)->create();
        // Report::factory()->count(5)->create();
        // Answer::factory()->count(5)->create();
        // Newsletter::factory()->count(5)->create();
        // UserSocial::factory()->count(5)->create();
        // Bookmark::factory()->count(5)->create();
        // CourseCurrency::factory()->count(5)->create();
        // CourseRequirement::factory()->count(5)->create();
        // InstructorCourse::factory()->count(5)->create();
        // Topic::factory()->count(5)->create();
        // Comment::factory()->count(5)->create();
        // Category::factory()->count(5)->create();
        // CourseLevel::factory()->count(5)->create();
        // Currency::factory()->count(5)->create();
        // Language::factory()->count(5)->create();
        // Release::factory()->count(5)->create();
        // Social::factory()->count(5)->create();
        // Status::factory()->count(5)->create();
        // Type::factory()->count(5)->create();
        // Video::factory()->count(5)->create();
    }
}
