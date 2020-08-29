<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->integer('size');
            $table->integer('price');
            $table->integer('nbr_achete');
            $table->float('raiting');
            $table->string('slug');
            $table->string('image');
            $table->string('description');
            $table->boolean('active',true);
            $table->boolean('single',false);
            $table->text('body');
            
            $table->integer('architecte_id')->unsigned();
            $table->foreign('architecte_id')->references('id')->on('architectes');
    
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
        Schema::dropIfExists('plans');
    }
}
