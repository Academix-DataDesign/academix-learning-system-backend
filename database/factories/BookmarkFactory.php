<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bookmark;

class BookmarkFactory extends Factory
{
    protected $model = Bookmark::class;

    public function definition()
    {
        return [
            'student_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'instructor_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
