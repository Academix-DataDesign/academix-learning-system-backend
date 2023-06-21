<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CourseCurrency;

class CourseCurrencyFactory extends Factory
{
    protected $model = CourseCurrency::class;

    public function definition()
    {
        return [
            'course_id' => function () {
                return \App\Models\Course::factory()->create()->id;
            },
            'currency_id' => function () {
                return \App\Models\Currency::factory()->create()->id;
            },
        ];
    }
}
