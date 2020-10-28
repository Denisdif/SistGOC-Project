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
            $table->integer('Tipo_proyecto_id')->unsigned() ->nullable();
            $table->bigInteger('Codigo_catastral')             ->nullable();
            $table->date('Fecha_inicio_Proy');
            $table->date('Fecha_fin_Proy');
            $table->integer('Director_id')->unsigned()      ->nullable();
            $table->integer('Comitente_id')->unsigned()     ->nullable();
            $table->text('Descripcion')                     ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Director_id')->references('id')->on('personals');
            $table->foreign('Tipo_proyecto_id')->references('id')->on('tipo_proyectos');
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
