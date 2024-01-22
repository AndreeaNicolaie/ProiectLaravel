<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeakersSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Speaker');
            $table->unsignedBigInteger('ID_Sesiune');
            $table->timestamps();

            $table->foreign('ID_Speaker')
            ->references('id')->on('speakers')
            ->onDelete('cascade');

            $table->foreign('ID_Sesiune')
            ->references('id')->on('sessions')
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
        Schema::dropIfExists('speakers_sessions');
    }
}
