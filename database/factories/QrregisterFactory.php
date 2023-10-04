<?php

namespace Database\Factories;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QrregisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   $slug=Str::random(10);
        
        QrCode::format('svg')->size('300')->generate('https://riderschilenos.cl/garage/'.$slug, '../public/storage/qrcodes/'.$slug.'.svg');

        return [  

            'slug'=>$slug,
            'nro'=>$this->faker->numberBetween($min = 100000, $max = 999999),
            'pass'=>$this->faker->numberBetween($min = 1000, $max = 9999),
            'qr'=>'qrcodes/'.$slug.'.svg'
        ];
    }
}
