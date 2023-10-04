<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespachosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->id();

            $table ->foreignId('pedido_id')
            ->constrained('pedidos')
            ->onDelete('cascade');
            
            $table->unsignedbigInteger('despachable_id');
            $table->string('despachable_type');

            $table ->foreignId('direccion_id')
            ->nullable()
            ->constrained('direccions')
            ->onDelete('set null');

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
        Schema::dropIfExists('despachos');
    }
}
