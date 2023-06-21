<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Section;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition()
    {
        return [
            'course_id' => function () {
                return \App\Models\Course::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}
