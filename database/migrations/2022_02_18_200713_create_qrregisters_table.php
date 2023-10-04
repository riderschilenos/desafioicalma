<?php

use App\Models\Qrregister;
use App\Models\Vehiculo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrregisters', function (Blueprint $table) {
            $table->id();

            $table->string('slug');
            $table->integer('nro');
            $table->integer('pass');

            $table->integer('value');

            $table->date('active_date')->nullable();
            
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
        Schema::dropIfExists('qrregisters');
    }
}
