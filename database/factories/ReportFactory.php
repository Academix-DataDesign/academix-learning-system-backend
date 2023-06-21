<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;

class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'course_id' => function () {
                return \App\Models\Course::factory()->create()->id;
            },
            'student_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
