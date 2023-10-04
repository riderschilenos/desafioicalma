<?php

namespace Database\Factories;

use App\Models\Invitado;
use App\Models\Transportista;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   

        return [

            'status'=>$this->faker->numberBetween($min = 1, $max = 3),
            'user_id'=> $this->faker->numberBetween($min = 1, $max = 2),
            'transportista_id'=> Transportista::all()->random()->id,
            'pedidoable_id'=> Invitado::all()->random()->id,
            'pedidoable_type' => $this->faker->randomElement(['App\Models\Invitado', 'App\Models\Socio'])
            
        ];
    }
}
