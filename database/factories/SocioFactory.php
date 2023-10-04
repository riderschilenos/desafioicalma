<?php

namespace Database\Factories;

use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rut' => $this->faker->numerify('##.###.###-#'),
            'born_date' => $this->faker->unique()->safeEmail(),
            'prevision' => $this->faker->name(),
            'nro' => $this->faker->name(),
            'user_id'=> User::all()->random()->id,
            'disciplina_id'=> Disciplina::all()->random()->id
        ];
    }
}
	
