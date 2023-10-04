<?php

namespace Database\Factories;

use App\Models\Invitado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calle'=>$this->faker->sentence(),
            'numero'=>$this->faker->numberBetween($min = 1, $max = 100),
            'block'=>$this->faker->numberBetween($min = 1, $max = 10),
            'comuna'=>$this->faker->randomElement(['Requinoa', 'Lo espejo','Cerrillos','Lampa','San Miguel','San Joaquin']),
            'region'=>$this->faker->randomElement(['I Región', 'II Región','III Región','IV Región','V Región','VI Región','VII Región','VIII Región','IX Región','X Región','XI Región','XII Región','XIII Región','XIV Región','XV Región','XVI Región']),

            
            
        ];
    }
}
