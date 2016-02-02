<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',128);
            $table->float('duracion');
            $table->text('descripcion');
            $table->integer('tipo_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_id')
                  ->references('id')
                  ->on('tipo_servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropForeign('servicios_tipo_id_foreign');
        });
        Schema::drop('servicios');
    }
}
