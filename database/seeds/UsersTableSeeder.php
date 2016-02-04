<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(['nombre' => 'Administrador','apellidos' => 'Apellido', 'dni'=> "44011000", 'direccion'=>'Av. Admin',
                        'email' => 'admin@llika.com', 'password' => bcrypt('admin132')]);
        User::insert(['nombre' => 'Administrador2','apellidos' => 'Apellido2', 'dni'=> "22011000", 'direccion'=>'Av. Admin',
                        'email' => 'administrador@llika.com', 'password' => bcrypt('admin132')]);
    }
}
