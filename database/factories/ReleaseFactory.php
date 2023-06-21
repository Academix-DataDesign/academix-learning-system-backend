<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Release;

class ReleaseFactory extends Factory
{
    protected $model = Release::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'link' => $this->faker->url,
            'instructor_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'date' => $this->faker->dateTime,
        ];
    }
}
