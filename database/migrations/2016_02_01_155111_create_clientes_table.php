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
            $table->string('nombre',200)->default('');
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
