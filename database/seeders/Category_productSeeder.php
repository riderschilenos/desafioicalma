<?php

namespace Database\Seeders;

use App\Models\Category_product;
use Illuminate\Database\Seeder;

class Category_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category_product::create([
            'name'=>'Carcasas de Smartphone'
        ]);

        Category_product::create([
            'name'=>'Llavero/Collar/Colgante'
        ]);

        Category_product::create([
            'name'=>'Poleras y Polerones'
        ]);

        
    }
}
