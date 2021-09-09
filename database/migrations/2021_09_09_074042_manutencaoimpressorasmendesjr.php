<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manutencaoimpressorasmendesjr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencaoimpressorasmendesjr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('impressoraMendesJr_id')->unsigned();
            $table->foreign('impressoraMendesJr_id')->references('id')->on('impressoras_mendes_jr')->onDelete('cascade');
            $table->string('responsavel');
            $table->date('data');
            $table->string('descricao');
            $table->float('valor');
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
        Schema::dropIfExists('manutencaoimpressorasmendesjr');
    }
}
