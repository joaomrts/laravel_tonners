<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImpressorasMendesJr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impressorasMendesJr', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('modelo');
            $table->string('tonner');
            $table->string('setor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impressorasMendesJr');
    }
}

