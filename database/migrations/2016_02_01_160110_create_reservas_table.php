<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicio_id')->unsigned();
            $table->integer('empresa_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('bus_id')->unsigned();

            $table->integer('cantidad_pasajeros');
            $table->date('fecha_reserva');
            $table->integer('duracion');
            $table->string('hotel_inicio');
            $table->string('hotel_fin');
            $table->time('hora_inicio');
            $table->timestamps();

            $table->foreign('servicio_id')
                  ->references('id')
                  ->on('servicios');
            $table->foreign('empresa_id')
                  ->references('id')
                  ->on('empresas');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('bus_id')
                  ->references('id')
                  ->on('buses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign('reservas_servicio_id_foreign');
            $table->dropForeign('reservas_empresa_id_foreign');
            $table->dropForeign('reservas_user_id_foreign');
            $table->dropForeign('reservas_bus_id_foreign');
        });
        Schema::drop('reservas');
    }
}
