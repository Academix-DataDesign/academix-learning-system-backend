<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;

class TypeFactory extends Factory
{
    protected $model = Type::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Admin', 'Instructor', 'Learner']),
        ];
    }
}
