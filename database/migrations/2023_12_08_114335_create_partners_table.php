<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('Nume_Partener');
            $table->string('Descriere');
            $table->string('Contact_Nume');
            $table->string('Contact_Email');
            $table->string('Contact_Telefon');
            $table->unsignedBigInteger('ID_Event');
            $table->unsignedBigInteger('ID_Package');
            $table->timestamps();
            $table->foreign('ID_Event')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->foreign('ID_Package')
                ->references('id')->on('packages')
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
        Schema::dropIfExists('partners');
    }
}
