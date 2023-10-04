<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletaStravasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atleta_stravas', function (Blueprint $table) {
            $table->id();

            $table ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('atleta_id')->unique();
            $table->string('access_token');
            $table->string('refresh_token')->nullable();
            $table->timestamp('token_expires_at')->nullable();
            $table->string('scope')->nullable();
            $table->string('athlete_name')->nullable();

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
        Schema::dropIfExists('atleta_stravas');
    }
}
