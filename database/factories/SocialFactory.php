<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Social;

class SocialFactory extends Factory
{
    protected $model = Social::class;

    public function definition()
    {
        return [
            'icon' => $this->faker->word,
            'name' => $this->faker->word,
        ];
    }
}
