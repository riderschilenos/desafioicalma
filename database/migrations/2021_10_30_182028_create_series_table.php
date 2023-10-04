<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Serie;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->string('subtitulo');
            $table->text('descripcion');
            $table->enum('status',[Serie::BORRADOR,Serie::REVISION,Serie::PUBLICADO])->default(Serie::BORRADOR);
            $table->string('slug');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->unsignedBigInteger('precio_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('set null');
            $table->foreign('precio_id')->references('id')->on('precios')->onDelete('set null');

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
        Schema::dropIfExists('series');
    }
}
