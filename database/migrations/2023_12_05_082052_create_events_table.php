<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('Nume_Eveniment');
            $table->string('Descriere');
            $table->string('Image_path');
            $table->dateTime('Data_Start');
            $table->dateTime('Data_Finish');
            $table->string('Locatie');
            $table->integer('Numar_Participant_Maxim');
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
        Schema::dropIfExists('events');
    }
}
