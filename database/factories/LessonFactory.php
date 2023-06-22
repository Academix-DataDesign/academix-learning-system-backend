<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Video;


class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'path' => $this->faker->url,
            'content' => $this->faker->paragraph,
            'section_id' => function () {
                return Section::factory()->create()->id;
            },
            'video_id' => function () {
                return Video::factory()->create()->id;
            },
        ];
    }
}
