<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehiculo_type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $title = $this->faker->sentence();

        return [
            'marca'=>$this->faker->randomElement(['HONDA', 'SUZUKI','YAMAHA','KAWASAKI','KTM']),
            'modelo'=>$this->faker->randomElement(['CRF', 'RMZ','YZF','KXF','SXF']),
            'cilindrada'=>$this->faker->randomElement(['150', '250','350','450','1100']),
            'aro_front'=>$this->faker->numberBetween($min = 18, $max = 29),
            'aro_back'=>$this->faker->numberBetween($min = 18, $max = 29),
            'año'=>$this->faker->numberBetween($min = 1990, $max = 2021),
            'slug'=>Str::slug($title),
            'status'=>$this->faker->numberBetween($min = 1, $max = 3),
            'precio'=>$this->faker->numberBetween($min = 1000000, $max = 5000000),
            'user_id'=> User::all()->random()->id,
            'vehiculo_type_id'=> Vehiculo_type::all()->random()->id
        ];
    }

}

