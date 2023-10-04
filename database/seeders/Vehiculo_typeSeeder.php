<?php

namespace Database\Seeders;

use App\Models\Vehiculo_type;
use Illuminate\Database\Seeder;

class Vehiculo_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculo_type::create([
            'name'=>'Motocross/Enduro'
        ]);

        Vehiculo_type::create([
            'name'=>'MotoGP'
        ]);

        Vehiculo_type::create([
            'name'=>'Moto de Calle'
        ]);

        Vehiculo_type::create([
            'name'=>'Moto de Agua'
        ]);

        Vehiculo_type::create([
            'name'=>'JetSky'
        ]);

        Vehiculo_type::create([
            'name'=>'Embarcación'
        ]);

        Vehiculo_type::create([
            'name'=>'ATV'
        ]);

        Vehiculo_type::create([
            'name'=>'UTV/Buggy'
        ]);
    }
}
