<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InstructorCourse;

class InstructorCourseFactory extends Factory
{
    protected $model = InstructorCourse::class;

    public function definition()
    {
        return [
            'instructor_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'course_id' => function () {
                return \App\Models\Course::factory()->create()->id;
            },
        ];
    }
}
