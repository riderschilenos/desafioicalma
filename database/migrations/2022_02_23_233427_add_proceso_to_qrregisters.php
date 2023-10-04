<?php

use App\Models\Qrregister;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProcesoToQrregisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qrregisters', function (Blueprint $table) {
         
            $table->enum('proceso',[Qrregister::BORRADOR,Qrregister::DISEÑADO,Qrregister::IMPRESO,Qrregister::CONSIGNACION,Qrregister::VENDIDO])->default(Qrregister::BORRADOR);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qrregisters', function (Blueprint $table) {
            //
        });
    }
}
