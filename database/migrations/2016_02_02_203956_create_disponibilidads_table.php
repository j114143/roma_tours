<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicio_id')->unsigned();
            $table->integer('bus_id')->unsigned();
            $table->time('hora');
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('servicio_id')
                  ->references('id')
                  ->on('servicios');
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
        Schema::drop('disponibilidades');
    }
}
