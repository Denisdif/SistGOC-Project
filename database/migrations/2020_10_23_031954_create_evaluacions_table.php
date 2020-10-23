<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Evaluador_id')->unsigned();
            $table->integer('Personal_id')->unsigned();
            $table->date('Fecha_inicio');
            $table->date('Fecha_fin');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Evaluador_id')->references('id')->on('personals');
            $table->foreign('Personal_id')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluacions');
    }
}
