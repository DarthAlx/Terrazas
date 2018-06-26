<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60)->default('face_account');
            $table->date('dob')->nullable(true);
            $table->string('tel');
            $table->string('genero')->nullable(true);
            $table->string('avatar')->default(url('/img/dummy.png'));
            $table->string('empresa')->nullable(true);
            $table->string('token');
            $table->boolean('is_admin')->default(false);
            $table->enum('role',['usuario', 'proveedor', 'admin'])->default('usuario');
            $table->string('status')->default('Pendiente');
            $table->boolean('habilitado')->default(false);
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
        Schema::dropIfExists('users');
    }
}
