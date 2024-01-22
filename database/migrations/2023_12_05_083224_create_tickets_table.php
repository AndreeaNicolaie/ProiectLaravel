<?php

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
            $table->string('Tip_Bilet');
            $table->decimal('Pret');
            $table->unsignedBigInteger('ID_Event');
            $table->unsignedBigInteger('ID_Participant');
            $table->timestamps();

            $table->foreign('ID_Event')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->foreign('ID_Participant')
                ->references('id')->on('participants')
                ->onDelete('cascade');
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
