<?php

use App\Models\Vendedor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToVendedors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendedors', function (Blueprint $table) {
            
            $table->enum('estado',[Vendedor::BORRADOR,Vendedor::ACTIVO,Vendedor::BLOQUEADO])->default(Vendedor::BORRADOR);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendedors', function (Blueprint $table) {
            //
        });
    }
}
