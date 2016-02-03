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
            $table->integer('cliente_id')->unsigned()->nullable();            
            $table->integer('bus_id')->unsigned();

            $table->integer('cantidad_pasajeros');
            $table->date('fecha_reserva');
            $table->integer('duracion');
            $table->string('lugar_inicio');
            $table->string('lugar_fin');

            $table->boolean('confirmado')->default(false);
            $table->time('hora_inicio');
            $table->timestamps();

            $table->foreign('servicio_id')
                  ->references('id')
                  ->on('servicios');
            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('clientes');
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
            $table->dropForeign('reservas_cliente_id_foreign');
            $table->dropForeign('reservas_bus_id_foreign');
        });
        Schema::drop('reservas');
    }
}
