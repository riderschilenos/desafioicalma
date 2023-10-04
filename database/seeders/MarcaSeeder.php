<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Marcasmartphone;
use App\Models\Modelo;
use App\Models\Smartphone;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'name'=>'KTM',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'HONDA',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'SUZUKI',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'YAMAYA',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'KAWASAKI',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'HUSQVARNA',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'SHERCO',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'GAS GAS',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'CAN-AM',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'TAKASAKI',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'TM-RACING',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'KTM-REDBULL',
            'disciplina_id'=>1
        ]);
        Marca::create([
            'name'=>'GIANT',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'SPECIALIZED',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'CANNONDALE',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'TREK',
            'disciplina_id'=>2
        ]);
        
        Marca::create([
            'name'=>'KONA',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'NORCO',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'ORBEA',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'MONDRAKER',
            'disciplina_id'=>2
        ]);
        
        Marca::create([
            'name'=>'POLYGON',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'COMMENCAL',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'SCOTT',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'SANTA CRUZ',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'YETI',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'BIANCHI',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'OAKLEY',
            'disciplina_id'=>2
        ]);
        
        Marca::create([
            'name'=>'SRAM',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'SHIMANO',
            'disciplina_id'=>2
        ]);
        Marca::create([
            'name'=>'TROY LEE DESIGNS',
            'disciplina_id'=>2
        ]);

        Modelo::factory(250)->create();

        

        Marcasmartphone::create([
            'name'=>'APPLE',
        ]);

        Marcasmartphone::create([
            'name'=>'SAMSUNG',
        ]);

        Smartphone::create([
            'marcasmartphone_id'=>1,
            'modelo'=>'Iphone 11',
            'stock'=>5
        ]);
    }
}
