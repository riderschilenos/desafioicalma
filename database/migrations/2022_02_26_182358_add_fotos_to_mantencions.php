<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotosToMantencions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mantencions', function (Blueprint $table) {
            $table->string('foto')->nullable();
            $table->string('repuestos')->nullable();
            $table->string('comprobante')->nullable();
            $table->string('titulo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mantencions', function (Blueprint $table) {
            //
        });
    }
}
