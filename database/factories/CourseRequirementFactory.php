<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CourseRequirement;

class CourseRequirementFactory extends Factory
{
    protected $model = CourseRequirement::class;

    public function definition()
    {
        return [
            'course_id' => function () {
                return \App\Models\Course::factory()->create()->id;
            },
            'text' => $this->faker->sentence,
        ];
    }
}
