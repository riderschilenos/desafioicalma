<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvitadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'fono' => $this->faker->name(),
            'rut' => $this->faker->numerify('##.###.###-#'),
        ];
    }
}
