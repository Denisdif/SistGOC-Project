<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsideracionAmbientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consideracion_ambientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Complejidad');
            $table->integer('Ambiente_id')->unsigned();
            $table->integer('Consideracion_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Ambiente_id')->references('id')->on('ambientes');
            $table->foreign('Consideracion_id')->references('id')->on('consideracions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consideracion_ambientes');
    }
}
