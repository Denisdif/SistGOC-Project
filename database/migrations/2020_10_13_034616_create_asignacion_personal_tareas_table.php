<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionPersonalTareasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_personal_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Responsabilidad');
            $table->integer('Personal_id')->unsigned();
            $table->integer('Tarea_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Personal_id')->references('id')->on('personals');
            $table->foreign('Tarea_id')->references('id')->on('tareas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignacion_personal_tareas');
    }
}
