<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comprascilindros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprascilindros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cilindro_id')->unsigned();
            $table->foreign('cilindro_id')->references('id')->on('cilindro')->onDelete('cascade');
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
        Schema::dropIfExists('comprascilindros');
    }
}
