<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filmmaker;

class FilmmakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filmmaker::create([
            'name'=>'John Dollenz',
            'nro_cuenta'=>'16000000',
            'tipo_cuenta'=>'Vista',
            'rut'=>'16.000.000-0',
            'banco'=>'Banco Estado',
            'pagina'=>'www.johndollenz.cl',
            'instagram'=>'@john_dollenz',
            'fono'=>'666666',
            'youtube'=>'John Dollenz',
            'user_id'=>2
            
             ]);

        Filmmaker::create([
            'name'=>'Gonzalo Films',
            'nro_cuenta'=>'73140439',
            'tipo_cuenta'=>'Corriente',
            'rut'=>'18.648.284-0',
            'banco'=>'Banco Santander',
            'pagina'=>'www.gpcreative.cl',
            'instagram'=>'@gonzapv23',
            'fono'=>'963176726',
            'youtube'=>'RidersChilenos', 
            'user_id'=>1
                
             ]);
    }
}

