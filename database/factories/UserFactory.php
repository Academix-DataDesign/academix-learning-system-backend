<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'type_id' => 3,
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('nekalozinka'),
            'avatar' => 'avatar.png',
            'license' => null,
            'bio' => null,
            'town' => null,
            'country' => null,
            'short_bio' => 'Lorem ipsum',
        ];
    }
}
