<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            
            $table  ->foreignId('marca_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');

            $table  ->foreignId('category_product_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');
            
            $table->string('name');
            
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
        Schema::dropIfExists('modelos');
    }
}
