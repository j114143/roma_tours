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
            $table->float('precio_soles');
            $table->float('precio_dolares');
            $table->text('descripcion');
            $table->text('tipo_id');
            $table->timestamps();

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
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropForeign('servicios_tipo_id_foreign');
        });
        Schema::drop('servicios');
    }
}
