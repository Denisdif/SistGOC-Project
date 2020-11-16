<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_proyecto');
            $table->string('Informe')                       ->nullable();
            $table->integer('Tipo_proyecto_id')->unsigned();
            $table->string('Codigo_catastral')              ->nullable();
            $table->dateTime('Fecha_inicio_Proy')           ->nullable();
            $table->dateTime('Fecha_fin_Proy')              ->nullable();
            $table->integer('Director_id')->unsigned();
            $table->integer('Comitente_id')->unsigned();
            $table->integer('Direccion_id')->unsigned();
            $table->text('Descripcion')                     ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Director_id')->references('id')->on('personals');
            $table->foreign('Tipo_proyecto_id')->references('id')->on('tipo_proyectos');
            $table->foreign('Direccion_id')->references('id')->on('direccions');
            $table->foreign('Comitente_id')->references('id')->on('comitentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyectos');
    }
}
