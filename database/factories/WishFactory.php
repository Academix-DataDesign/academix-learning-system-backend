<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Wish;

class WishFactory extends Factory
{
    protected $model = Wish::class;

    public function definition()
    {
        return [
            'student_id' => \App\Models\User::factory(),
            'course_id' => \App\Models\Course::factory(),
        ];
    }
}
