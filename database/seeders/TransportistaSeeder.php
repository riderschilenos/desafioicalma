<?php

namespace Database\Seeders;

use App\Models\Transportista;
use Illuminate\Database\Seeder;

class TransportistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transportista::create([
            'name'=>'Starken'
        ]);

        Transportista::create([
            'name'=>'Chilexpress'
        ]);
        Transportista::create([
            'name'=>'Retiro en tienda'
        ]);
    }
}
