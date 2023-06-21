<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserSocial;

class UserSocialFactory extends Factory
{
    protected $model = UserSocial::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'social_id' => function () {
                return \App\Models\Social::factory()->create()->id;
            },
        ];
    }
}
