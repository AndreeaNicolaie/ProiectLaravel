<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('agendas', function (Blueprint $table) {
        $table->id();
        $table->string("Nume_Sesiune");
        $table->time("Ora_Start");
        $table->time("Ora_Finish");
        $table->string("Descriere");

        $table->unsignedBigInteger('ID_Event');
        $table->foreign('ID_Event')->references('id')->on('events')->onDelete('cascade');
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
        Schema::dropIfExists('agenda');
    }
}