<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechaCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fecha_categorias', function (Blueprint $table) {
            $table->id();
 
                $table  ->foreignId('fecha_id')
                ->constrained()
                ->onDelete('cascade');

                $table->foreignId('categoria_id')
                ->constrained()
                ->onDelete('cascade');

                $table->integer('inscripcion')->Nullable();
                $table->string('limite')->Nullable();

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
        Schema::dropIfExists('fecha_categorias');
    }
}
