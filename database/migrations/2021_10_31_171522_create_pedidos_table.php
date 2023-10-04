<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Pedido;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->enum('status',[Pedido::BORRADOR,Pedido::REVISION,Pedido::PUBLICADO]);
            
            
            $table  ->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');

            $table  ->foreignId('transportista_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');
            

            $table->unsignedbigInteger('pedidoable_id');
            $table->string('pedidoable_type');
            
                    


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
