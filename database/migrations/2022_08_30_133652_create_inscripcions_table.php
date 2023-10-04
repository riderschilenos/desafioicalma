<?php

use App\Models\Inscripcion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('ticket_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('categoria_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('fecha_categoria_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');
            
            $table->foreignId('fecha_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->string('cantidad')->nullable();

            $table->string('nro')->nullable();
            
            $table->string('resultado')->nullable();

            $table->enum('estado',[Inscripcion::CERRADA,Inscripcion::BORRADOR,Inscripcion::PAGADA,Inscripcion::ACTIVA,Inscripcion::USADA])->default(Inscripcion::BORRADOR);

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
        Schema::dropIfExists('inscripcions');
    }
}
