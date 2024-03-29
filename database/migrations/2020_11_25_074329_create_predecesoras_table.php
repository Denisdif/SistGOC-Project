<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredecesorasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predecesoras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Tarea_id')->unsigned();
            $table->integer('Predecesora_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Tarea_id')->references('id')->on('tareas');
            $table->foreign('Predecesora_id')->references('id')->on('tareas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('predecesoras');
    }
}
