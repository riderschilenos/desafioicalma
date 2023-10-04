<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmmakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmmakers', function (Blueprint $table) {
            $table->id();

            $table->text('name')->Nullable();
            $table->string('nro_cuenta')->Nullable();
            $table->string('tipo_cuenta')->Nullable();
            $table->string('rut')->Nullable();
            $table->string('banco')->Nullable();
            $table->string('pagina')->Nullable();
            $table->string('instagram')->Nullable();
            $table->string('fono')->Nullable();
            $table->string('youtube')->Nullable();
            
            
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
        Schema::dropIfExists('filmmakers');
    }
}
