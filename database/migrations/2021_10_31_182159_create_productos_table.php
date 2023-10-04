<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Producto;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            
            $table->string('name');
            $table->integer('precio');
            $table->integer('comision_invitado');
            $table->integer('comision_socio');
            $table->string('descripcion')->nullable();
            $table->enum('status',[Producto::BORRADOR,Producto::REVISION,Producto::PUBLICADO])->default(Producto::BORRADOR);

            $table  ->foreignId('category_product_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');

            $table  ->foreignId('disciplina_id')
            ->nullable()
            ->constrained()
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
        Schema::dropIfExists('productos');
    }
}
