<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Repositories\Models\PaymentMethod>
 */
class PaymentMethodFactory extends Factory
{
    public $model = \App\Repositories\Models\PaymentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'rate' => rand(0, 100)
        ];
    }
}
