<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'name'=>'Carcasas MX',
            'precio'=>15000,
            'comision_invitado'=>3000,
            'comision_socio'=>2000,
            'category_product_id'=>1,
            'disciplina_id'=>1,
            
             ]);

        Producto::create([
                'name'=>'Carcasas MTB',
                'precio'=>15000,
                'comision_invitado'=>3000,
                'comision_socio'=>2000,
                'category_product_id'=>1,
                'disciplina_id'=>2,
                
                 ]);
        
        Producto::create([
                    'name'=>'Carcasas con Foto',
                    'precio'=>18000,
                    'comision_invitado'=>3500,
                    'comision_socio'=>2000,
                    'category_product_id'=>1
                     ]);

        Producto::create([
            'name'=>'Llavero Personalizada',
            'precio'=>10000,
            'comision_invitado'=>2000,
            'comision_socio'=>100,
            'category_product_id'=>2,
            'disciplina_id'=>1,
            
             ]);

        Producto::create([
                'name'=>'Polera MX',
                'precio'=>15990,
                'comision_invitado'=>3000,
                'comision_socio'=>2000,
                'category_product_id'=>3,
                'disciplina_id'=>1,
                
                 ]);
        Producto::create([
                    'name'=>'Polera MTB',
                    'precio'=>15990,
                    'comision_invitado'=>3000,
                    'comision_socio'=>2000,
                    'category_product_id'=>3,
                    'disciplina_id'=>2,
                    
                     ]);


    }
}
