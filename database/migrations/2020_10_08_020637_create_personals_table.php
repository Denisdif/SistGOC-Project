<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NombrePersonal');
            $table->string('ApellidoPersonal');
            $table->string('Activo')                       ->nullable();
            $table->date('FechaNac');
            $table->integer('DNI')->unique();
            $table->bigInteger('Telefono')->unique();
            $table->integer('Direccion_id')->unsigned()     ->nullable();
            $table->integer('Sexo_id')->unsigned()          ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Direccion_id')->references('id')->on('direccions');
            $table->foreign('Sexo_id')->references('id')->on('sexos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personals');
    }
}
