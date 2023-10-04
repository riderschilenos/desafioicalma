<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Disciplina;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disciplina::create([
            'name'=>'Motocross'
        ]);

        Disciplina::create([
            'name'=>'MTB'
        ]);

        Disciplina::create([
            'name'=>'Enduro-Moto'
        ]);

        Disciplina::create([
            'name'=>'Dirt Jump'
        ]);

        Disciplina::create([
            'name'=>'Bmx'
        ]);

        Disciplina::create([
            'name'=>'Karting'
        ]);

        Disciplina::create([
            'name'=>'Moto Turismo'
        ]);

        Disciplina::create([
            'name'=>'Bici Ruta'
        ]);

    }
}
