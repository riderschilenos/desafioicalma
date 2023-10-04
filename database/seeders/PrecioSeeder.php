<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Precio;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Precio::create([
            'name'=>'Gratis',
            'value'=>0
        ]);

        Precio::create([
            'name'=>'$5.000 (Low Cost)',
            'value'=>5000
        ]);

        Precio::create([
            'name'=>'$10.000 (Factory)',
            'value'=>10000
        ]);



    }
}
