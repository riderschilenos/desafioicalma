<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Socio;
use Illuminate\Database\Seeder;

class SocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socios = Socio::factory(20)->create();

        foreach ($socios as $socio){

            Direccion::factory(1)->create([
                'direccionable_id' => $socio->id,
                'direccionable_type'=>'App\Models\Socio'
            ]);
        }
    }
}
