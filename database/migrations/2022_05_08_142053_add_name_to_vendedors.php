<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToVendedors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendedors', function (Blueprint $table) {
            
            $table->string('name');
            $table->string('fono');
            
            $table  ->foreignId('disciplina_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null');
            
            $table->string('localidad');

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
