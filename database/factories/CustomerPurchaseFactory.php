<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CustomerPurchase;

class CustomerPurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'method' => $this->faker->randomElement([
                CustomerPurchase::METHOD_CREDIT_CARD,
                CustomerPurchase::METHOD_PAYPAL,
            ]),
            'amount' => $this->faker->randomFloat(2, 10, 200),
        ];
    }
}
