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
            $table->integer('Legajo');
            $table->date('FechaNac');
            $table->integer('DNI');
            $table->integer('Rol_id')->unsigned();
            $table->integer('User_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('User_id')->references('id')->on('users');
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
