<?php

namespace Database\Factories;

use App\Repositories\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    public $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->currencyCode(),
            'name' => $this->faker->name(),
            'show' => rand(0, 1)
        ];
    }
}
