<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->integer('conductor_id')->unsigned();
            $table->string('numero_licencia');
            $table->date('fecha_emision');
            $table->date('fecha_revalidacion');
            $table->string('direccion');
            $table->boolean('eliminado')->default(false);
            $table->timestamps();

            $table->primary('conductor_id');
            $table->foreign('conductor_id')
                  ->references('id')
                  ->on('conductors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('licencias', function (Blueprint $table) {
            $table->dropForeign('licencias_conductor_id_foreign');
        });
        Schema::drop('licencias');
    }
}
