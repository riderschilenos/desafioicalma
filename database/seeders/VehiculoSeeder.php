<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $vehiculos = Vehiculo::factory(40)->create();
        
        foreach ($vehiculos as $vehiculo){

            Image::factory(1)->create([
                'imageable_id' => $vehiculo->id,
                'imageable_type'=>'App\Models\Vehiculo'
            ]);
        }
    }

}

