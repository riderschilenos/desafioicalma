<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastoPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto_pedido', function (Blueprint $table) {
            $table->id();

            $table  ->foreignId('gasto_id')
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
        Schema::dropIfExists('gasto_pedido');
    }
}
