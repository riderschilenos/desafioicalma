<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuspiciadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auspiciadors', function (Blueprint $table) {
            $table->id();

            $table->string('logo');
            $table->string('name');
            $table->string('control');
            $table->string('beneficio');

 

            $table->unsignedbigInteger('auspiciadorable_id');
            $table->string('auspiciadorable_type');

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
        Schema::dropIfExists('auspiciadors');
    }
}
