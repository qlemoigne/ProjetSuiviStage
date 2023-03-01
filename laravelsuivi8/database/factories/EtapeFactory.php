<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtapeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->text,
            'echeance' => $this->faker->randomDigit,
            'importance' => $this->faker->boolean
            //
        ];
    }
}
