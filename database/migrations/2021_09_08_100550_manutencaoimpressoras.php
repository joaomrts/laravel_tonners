<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manutencaoimpressoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencaoimpressoras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('impressora_id')->unsigned();
            $table->foreign('impressora_id')->references('id')->on('impressora');
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
        Schema::dropIfExists('manutencaoimpressoras');
    }
}
