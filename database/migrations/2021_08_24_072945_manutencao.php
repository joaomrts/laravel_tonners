<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manutencao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipamento_id')->unsigned();
            $table->string('numeroIp');
            $table->string('equipamento');
            $table->string('responsavel');
            $table->date('data');
            $table->string('tipo');
            $table->string('servico');
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
        Schema::dropIfExists('manutencao');
    }
}
