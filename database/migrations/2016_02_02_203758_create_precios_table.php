<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->integer('servicio_id')->unsigned();
            $table->integer('tipo_bus_id')->unsigned();
            $table->float('precio_soles');
            $table->float('precio_dolares');
            $table->primary(['servicio_id', 'tipo_bus_id']);
            $table->timestamps();

            $table->foreign('servicio_id')
                  ->references('id')
                  ->on('servicios');
            $table->foreign('tipo_bus_id')
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
        Schema::table('precios', function (Blueprint $table) {
            $table->dropForeign('precios_servicio_id_foreign');
            $table->dropForeign('precios_tipo_bus_id_foreign');
        });
        Schema::drop('precios');
    }
}
