<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('es_admin')->default(true);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni');
            $table->string('telefono', 64);
            $table->string('direccion', 64);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
