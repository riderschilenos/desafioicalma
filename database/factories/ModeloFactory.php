<?php

namespace Database\Factories;

use App\Models\Category_product;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'category_product_id'=> $this->faker->numberBetween($min = 1, $max = 2),
            'marca_id'=> Marca::all()->random()->id,
            'name'=>$this->faker->numberBetween($min = 1, $max = 250),

           
        ];
    }
}
