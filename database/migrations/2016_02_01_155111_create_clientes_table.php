<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCLientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('empresa')->default(false);
            $table->string('razon_social',200)->default('');
            $table->string('nombres',64)->default('');
            $table->string('apellidos',64)->default('');
            $table->integer('ruc')->default('00000000000');
            $table->integer('dni')->default('00000000');
            $table->string('direccion');
            $table->string('telefono',64);
            $table->string('email',120);
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
        Schema::drop('clientes');
    }
}
