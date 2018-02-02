<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrendamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrendamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinicas_id')->unsigned();
            $table->foreign('clinicas_id')->references('id')->on('clinicas');
            $table->date('fecha_creacion');
            $table->date('fecha_vencimiento');
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
        Schema::dropIfExists('arrendamientos');
    }
}
