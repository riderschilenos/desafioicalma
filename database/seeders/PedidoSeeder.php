<?php

namespace Database\Seeders;

use App\Models\Direccion;
use App\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedidos = Pedido::factory(20)->create();

        
        
    }
}
