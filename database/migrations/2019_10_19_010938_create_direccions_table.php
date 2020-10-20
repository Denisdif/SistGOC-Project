<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Calle');
            $table->integer('Altura');
            $table->integer('Codigo_postal')->unsigned();
            $table->integer('Pais_id')->unsigned();
            $table->integer('Provincia_id')->unsigned();
            $table->integer('Localidad_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Pais_id')->references('id')->on('paises');
            $table->foreign('Provincia_id')->references('id')->on('provincias');
            $table->foreign('Localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('direccions');
    }
}
