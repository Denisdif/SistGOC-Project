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
            $table->string('ApellidoComitente')                 ->nullable();
            $table->string('Email')->unique();
            $table->bigInteger('Telefono')->unique();
            $table->bigInteger('Cuit')->unique();
            $table->integer('Sexo_id')->unsigned()              ->nullable();
            $table->integer('Direccion_id')->unsigned()         ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Sexo_id')->references('id')->on('sexos');
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
