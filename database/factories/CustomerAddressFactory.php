<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'city' => $this->faker->streetName(),
            'state' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
        ];
    }
}
