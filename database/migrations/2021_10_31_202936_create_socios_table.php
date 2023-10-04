<?php

use App\Models\Socio;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('slug');
            $table->string('rut');
            $table->string('fono')->nullable();
            $table->enum('fono_view',[Socio::ACTIVE,Socio::INACTIVE])->default(Socio::INACTIVE);
            $table->date('born_date');
            $table->string('prevision');
            $table->string('nro');

            $table->enum('status',[Socio::ACTIVE,Socio::INACTIVE])->default(Socio::INACTIVE);
            $table->enum('email_view',[Socio::ACTIVE,Socio::INACTIVE])->default(Socio::INACTIVE);

            $table ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table  ->foreignId('disciplina_id')
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
        Schema::dropIfExists('socios');
    }
}
