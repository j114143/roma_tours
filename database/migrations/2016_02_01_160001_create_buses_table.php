<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->unsigned();
            $table->string('placa',6);
            $table->integer('cantidad_asientos');
            $table->integer('numero_motor');
            $table->date('fecha_fabricacion');
            $table->string('image')->default("bus.png");
            $table->string('modelo',32);
            $table->string('numero_soat',32);
            $table->string('numero_seguro',32);
            $table->string('revision_tecnica',32);
            $table->integer('conductor_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('conductor_id')
                  ->references('id')
                  ->on('conductors');

            $table->foreign('tipo_id')
                  ->references('id')
                  ->on('tipo_buses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('buses', function (Blueprint $table) {
            $table->dropForeign('buses_conductor_id_foreign');
            $table->dropForeign('buses_tipo_id_foreign');
        });
        Schema::drop('buses');
    }
}
