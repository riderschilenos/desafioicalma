<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            $table ->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
            
            $table->string('name');
            $table->string('type');
            $table->string('photo_url')->nullable();
            $table->timestamp('start_date_local');
            $table->integer('moving_time');
            $table->float('distance');
            $table->float('total_elevation_gain');
            $table->float('average_speed');
            $table->float('max_speed');
            $table->boolean('commute');
            $table->boolean('private');
            $table->integer('achievement_count');

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
        Schema::dropIfExists('activities');
    }
}
