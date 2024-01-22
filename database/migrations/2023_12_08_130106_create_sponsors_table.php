<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('Nume_Sponsor');
            $table->text('Descriere');
            $table->string('Contact_Nume');
            $table->string('Contact_Email');
            $table->string('Contact_Telefon');
            
            $table->unsignedBigInteger('ID_Event');
            $table->foreign('ID_Event')->references('id')->on('events')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Eveniment');
            $table->foreign('ID_Eveniment')->references('id')->on('eveniments'); 
        });
        
    }
}