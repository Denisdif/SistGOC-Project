<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDFconfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_d_fconfigs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo');
            $table->string('nombre') ;
            $table->string('direccion') ;
            $table->string('telefono');
            $table->string('email') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_d_fconfigs');
    }
}
