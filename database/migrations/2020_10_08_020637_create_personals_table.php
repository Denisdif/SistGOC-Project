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
            $table->string('Apellido');
            $table->integer('Legajo')                       ->nullable();
            $table->date('FechaNac')                        ->nullable();
            $table->integer('DNI');
            $table->integer('Telefono')                     ->nullable();
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
