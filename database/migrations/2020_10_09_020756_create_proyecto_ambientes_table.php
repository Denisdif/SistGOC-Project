<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoAmbientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_ambientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cantidad');
            $table->integer('Ambiente_id')->unsigned();
            $table->integer('Proyecto_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Ambiente_id')->references('id')->on('ambientes');
            $table->foreign('Proyecto_id')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyecto_ambientes');
    }
}
