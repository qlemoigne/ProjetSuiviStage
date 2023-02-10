<?php

namespace Database\Factories;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{


    protected $model = Utilisateur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'telephone'=>$this->faker->phoneNumber,
            'mail'=>$this->faker->email,
            'status'=>$this-> faker->name,
            //
        ];
    }
}
