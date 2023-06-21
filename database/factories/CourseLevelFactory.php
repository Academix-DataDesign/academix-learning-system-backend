<?php

namespace Database\Factories;

use App\Models\CourseLevel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseLevelFactory extends Factory
{
    protected $model = CourseLevel::class;

    public function definition()
    {
        return [
            'level_name' => $this->faker->word,
        ];
    }
}
