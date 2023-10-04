<?php

namespace Database\Factories;

use App\Models\Platform;
use App\Models\Serie;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'url'=>$this->faker->sentence(),
            'iframe'=>'<iframe width="560" height="315" src="https://www.youtube.com/embed/5OoF_h6qKeQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'serie_id'=>Serie::all()->random()->id,
            'platform_id'=>Platform::all()->random()->id
        ];
    }
}

