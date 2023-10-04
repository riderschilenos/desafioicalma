<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use App\Models\Orden;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();

            $table ->foreignId('producto_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');

            $table ->foreignId('modelo_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');

            $table->string('talla')->nullable();

            $table ->foreignId('smartphone_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');
            
            $table->string('name')->nullable();
            $table->integer('numero')->nullable();
            $table->string('detalle')->nullable();
            $table->enum('status',[Orden::BORRADOR,Orden::REVISION,Orden::PUBLICADO])->default(Orden::BORRADOR);
            
            $table  ->foreignId('pedido_id')
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
        Schema::dropIfExists('ordens');
    }
}
