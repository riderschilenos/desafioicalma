<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();

            $table->string('name')->Nullable();
            $table->string('url')->Nullable();
            $table->string('iframe')->Nullable();

            $table  ->foreignId('serie_id')
            ->constrained()
            ->onDelete('cascade');

            $table ->foreignId('platform_id')
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
        Schema::dropIfExists('videos');
    }
}
