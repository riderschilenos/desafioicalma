<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas', function (Blueprint $table) {
            $table->id();

            $table  ->foreignId('evento_id')
            ->constrained()
            ->onDelete('cascade');


            $table->string('name');

            //datos del evento
            $table->date('fecha')->Nullable();
            $table->string('lugar')->Nullable();
            $table->string('inscripcion')->Nullable();

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
        Schema::dropIfExists('fechas');
    }
}
