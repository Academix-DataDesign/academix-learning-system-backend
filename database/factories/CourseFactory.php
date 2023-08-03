<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'category_id' => \App\Models\Category::factory(),
            'status_id' => \App\Models\Status::factory(),
            'language_id' => \App\Models\Language::factory(),
            'instructor_id' => \App\Models\User::factory(),
            'level_id' => \App\Models\CourseLevel::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'thumbnail_path' => 'thumbnail.png',
            'duration' => $this->faker->numberBetween(1, 100),
            'wishes' => 0,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'certification' => false,
            'bestseller' => false,
            'created_at' => $this->faker->dateTimeBetween('-6 days', 'now'),
        ];
    }
}
