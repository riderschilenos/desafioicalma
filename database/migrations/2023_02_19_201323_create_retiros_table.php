<?php

use App\Models\Retiro;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retiros', function (Blueprint $table) {
            $table->id();

            $table->string('metodo');

            $table->enum('estado',[Retiro::PENDIENTE,Retiro::APROBADO])->default(Retiro::PENDIENTE);

            $table->integer('cantidad');

            $table->string('comprobante')->nullable();

            $table ->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');

            $table ->foreignId('evento_id')
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
        Schema::dropIfExists('retiros');
    }
}
