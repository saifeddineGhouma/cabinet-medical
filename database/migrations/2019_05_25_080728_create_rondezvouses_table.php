<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRondezvousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rondezvouses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Heure_rdv');
            $table->date('daye_rdv');
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')
                   ->references('id')->on('users')
                   ->onDelete('cascade');
                   
            $table->unsignedInteger('medecin_id');

            $table->foreign('medecin_id')
                   ->references('id')->on('medecins')
                   ->onDelete('cascade');
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
        Schema::dropIfExists('rondezvouses');
    }
}
