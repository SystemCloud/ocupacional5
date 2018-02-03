<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_servicio');
            $table->timestamps();
        });

        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social');
            $table->integer('ruc');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('celular');
            $table->string('correo');
            $table->timestamps();
        });

        Schema::create('perfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_perfil');
            $table->timestamps();
        });

        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('direccion');
            $table->string('estado_civil');
            $table->integer('dni');
            $table->integer('edad');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->integer('perfiles_id')->unsigned();
            $table->foreign('perfiles_id')->references('id')->on('perfiles');
            $table->integer('empresas_id')->unsigned();
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->timestamps();

        });

        Schema::create('perfiles_examenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perfiles_id')->unsigned();
            $table->foreign('perfiles_id')->references('id')->on('perfiles');
            $table->integer('examenes_id')->unsigned();
            $table->foreign('examenes_id')->references('id')->on('examenes');
            $table->decimal('precio');
            $table->timestamps();
        });

        Schema::create('clinicas_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresas_id')->unsigned();
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->integer('clinicas_id')->unsigned();
            $table->foreign('clinicas_id')->references('id')->on('clinicas');
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
        Schema::dropIfExists('examenes');
        Schema::dropIfExists('empresas');
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('perfiles_examenes');
        Schema::dropIfExists('perfiles');
    }
}
