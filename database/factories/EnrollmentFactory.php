<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Enrollment;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'student_id' => \App\Models\User::factory(),
            'course_id' => \App\Models\Course::factory(),
            'enrolled_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
