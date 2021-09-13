<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comprastintas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprastintas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tinta_id')->unsigned();
            $table->foreign('tinta_id')->references('id')->on('tinta');
            $table->string('modelo');
            $table->string('fornecedor');
            $table->date('data');
            $table->float('qtde');
            $table->float('valor_un');
            $table->float('valor_total');
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
        Schema::dropIfExists('comprastintas');
    }
}
