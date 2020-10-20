<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComitentesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comitentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NombreComitente');
            $table->string('Apellido')                          ->nullable();
            $table->string('Email')                             ->nullable();
            $table->integer('Telefono')                         ->nullable();
            $table->integer('DNI')                              ->nullable();
            $table->string('Sexo')                              ->nullable();
            $table->integer('Direccion_id')->unsigned()         ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Direccion_id')->references('id')->on('direccions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comitentes');
    }
}
