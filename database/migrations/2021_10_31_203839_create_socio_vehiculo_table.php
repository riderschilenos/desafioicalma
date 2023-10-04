<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_vehiculo', function (Blueprint $table) {
            $table->id();

            $table ->foreignId('socio_id')
            ->constrained()
            ->onDelete('cascade');

            $table ->foreignId('vehiculo_id')
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
        Schema::dropIfExists('socio_vehiculo');
    }
}
