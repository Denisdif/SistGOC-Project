<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_tarea');
            $table->dateTime('Fecha_inicio')                        ->nullable();
            $table->dateTime('Fecha_fin')                           ->nullable();
            $table->dateTime('Fecha_limite')                        ->nullable();
            $table->double('Valor')                             ->nullable();
            $table->string('Correcciones')                      ->nullable();
            $table->text('Descripcion_tarea')                   ->nullable();
            $table->integer('Proyecto_id')->unsigned();
            $table->integer('Tipo_tarea_id')->unsigned();
            $table->integer('Estado_tarea_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Proyecto_id')->references('id')->on('proyectos');
            $table->foreign('Tipo_tarea_id')->references('id')->on('tipo_tareas');
            $table->foreign('Estado_tarea_id')->references('id')->on('estado_tareas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tareas');
    }
}
