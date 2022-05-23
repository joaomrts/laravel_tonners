<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manutencaoimpressorasxavantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencaoimpressorasxavantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('impressoraXavantes_id')->unsigned();
            $table->foreign('impressoraXavantes_id')->references('id')->on('impressorasxavantes');
            $table->string('modelo');
            $table->string('responsavel');
            $table->date('data');
            $table->string('defeito');
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
        Schema::dropIfExists('manutencaoimpressorasxavantes');
    }
}
