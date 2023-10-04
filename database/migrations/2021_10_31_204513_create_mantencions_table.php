<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantencions', function (Blueprint $table) {
            $table->id();

            
            $table->string('control');
            $table->string('servicio');

            $table ->foreignId('taller_id')
            ->nullable()
            ->constrained('talleres')
            ->onDelete('set null');

            $table ->foreignId('vehiculo_id')
            ->constrained('vehiculos')
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
        Schema::dropIfExists('mantencions');
    }
}
