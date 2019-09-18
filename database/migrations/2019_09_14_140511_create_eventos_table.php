<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sigla');
            $table->string('periodoinicio');
            $table->string('periodoiniciofim');
            $table->string('abertura');
            $table->string('deadline');
            $table->string('palavraChave');
            $table->string('areaconcentracao');
            $table->string('situacao');

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
        Schema::dropIfExists('eventos');
    }
}
