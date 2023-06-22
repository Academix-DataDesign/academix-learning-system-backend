<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\Lesson;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'body' => $this->faker->paragraph,
            'comment_id' => 1,
            'lesson_id' => function () {
                return Lesson::factory()->create()->id;
            },
        ];
    }
}
