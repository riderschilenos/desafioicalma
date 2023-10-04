<?php

use App\Models\Vehiculo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();

            $table->string('modelo')->nullable();
            $table->string('cilindrada')->nullable();
            $table->integer('aro_front')->nullable();
            $table->integer('aro_back')->nullable();
            $table->integer('año')->nullable();

            $table->string('slug');
            $table->enum('status',[Vehiculo::DESACTIVADO,Vehiculo::BORRADOR,Vehiculo::REVISION,Vehiculo::PUBLICADOOK,Vehiculo::PUBLICADOPENDIENTE,Vehiculo::REGISTRADO,Vehiculo::REGISTRADOVENTA])->default(Vehiculo::BORRADOR);
            $table->integer('precio')->nullable();
            $table->string('nro_serie')->nullable();
            $table->enum('comision',[Vehiculo::PAGO,Vehiculo::PORCENTAJE])->default(Vehiculo::PAGO);
            $table->text('descripcion')->nullable();
            $table ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table ->foreignId('marca_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');
            
            $table ->foreignId('vehiculo_type_id')
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
        Schema::dropIfExists('vehiculos');
    }
}
