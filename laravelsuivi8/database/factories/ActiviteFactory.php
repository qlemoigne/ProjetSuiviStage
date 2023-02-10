<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActiviteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'debut' => $this->faker->date,
            'fin' => $this->faker->date,
            'adresse' => $this->faker->address,
            'numero tuteur externe' => $this->faker->phoneNumber,
            //
        ];
    }
}
