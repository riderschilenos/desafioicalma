<?php

use App\Models\Pago;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            
            $table->enum('estado',[Pago::PENDIENTE,Pago::APROBADO])->default(Pago::PENDIENTE);

            $table->string('metodo');
            $table->integer('cantidad');
            $table->string('comprobante')->nullable();

            $table ->foreignId('user_id')
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
        Schema::dropIfExists('pagos');
    }
}
