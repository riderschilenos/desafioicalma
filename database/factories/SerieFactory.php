<?php

namespace Database\Factories;

use App\Models\Disciplina;
use App\Models\Serie;
use App\Models\User;
use App\Models\Precio;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class SerieFactory extends Factory
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
            'titulo'=>$title,
            'subtitulo'=>$this->faker->sentence(),
            'descripcion'=>$this->faker->sentence(),
            'status'=>$this->faker->numberBetween($min = 1, $max = 3),
            'slug'=>Str::slug($title),
            'user_id'=> $this->faker->numberBetween($min = 1, $max = 2),
            'disciplina_id'=> Disciplina::all()->random()->id,
            'precio_id'=> Precio::all()->random()->id
            
        ];
    }
}
