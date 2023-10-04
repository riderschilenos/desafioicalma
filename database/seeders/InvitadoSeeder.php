<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Invitado;
use Illuminate\Database\Seeder;

class InvitadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invitados = Invitado::factory(20)->create();

        foreach ($invitados as $invitado){

            Direccion::factory(1)->create([
                'direccionable_id' => $invitado->id,
                'direccionable_type'=>'App\Models\Invitado'
            ]);
        }
        
    }
}
