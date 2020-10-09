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
            $table->string('Tipo_proyecto');
            $table->integer('Nro_plantas');
            $table->date('Fecha_inicio_Proy');
            $table->date('Fecha_fin_Proy');
            $table->integer('Director_id');
            $table->integer('Comitente_id');
            $table->text('Descripcion');
            $table->timestamps();
            $table->softDeletes();
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
