<?php

use App\Models\Ticket;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->enum('status',[Ticket::BORRADOR,Ticket::CERRADO, Ticket::PAGADO, Ticket::COBRADO])->default(Ticket::BORRADOR);

            $table->string('qr')->nullable();

            $table->integer('inscripcion')->nullable();
                        
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');

            $table->foreignId('evento_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('set null');
            
            $table->unsignedbigInteger('ticketable_id');
            $table->string('ticketable_type');
            

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
        Schema::dropIfExists('tickets');
    }
}
