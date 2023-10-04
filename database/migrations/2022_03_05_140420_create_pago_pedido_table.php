<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_pedido', function (Blueprint $table) {
            $table->id();

            $table  ->foreignId('pago_id')
            ->constrained()
            ->onDelete('cascade');

            $table ->foreignId('pedido_id')
            ->constrained()
            ->onDelete('cascade');

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
        Schema::dropIfExists('pago_pedido');
    }
}
