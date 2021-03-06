<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Alexis Morales',
            'email'=>'alx.morales@outlook.com',
            'password'=>bcrypt('admin123'),
            'dob'=>'1992-09-30',
            'tel'=>'5549293724',
            'genero'=>'Masculino',
            'token'=>bcrypt('alx.morales@outlook.com'),
            'is_admin' =>true,
            'habilitado'=>true,
            'role'=>'admin'
        ]);

        DB::table('servicios')->insert([
            'nombre'=>'Baños',
            'icono'=>'<i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i>',
        ]);


        DB::table('users')->insert([
            'name'=>'Alexis Morales',
            'email'=>'cavalerasss@hotmail.com',
            'password'=>bcrypt('admin123'),
            'dob'=>'1992-09-30',
            'tel'=>'5549293724',
            'genero'=>'Masculino',
            'token'=>bcrypt('cavalerasss@hotmail.com'),
            'is_admin' =>true,
            'habilitado'=>true,
            'role'=>'proveedor'
        ]);
    }
}
