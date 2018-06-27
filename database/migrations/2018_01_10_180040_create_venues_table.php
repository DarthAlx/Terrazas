<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->longText('descripcion');
            $table->longText('direccion');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('zona');
            $table->integer('precio');
            $table->longText('imagen');
            $table->integer('capacidad');
            $table->longText('reglamento');
            $table->string('servicios');
            $table->string('tipo');
            $table->boolean('habilitado')->default(true);
            $table->boolean('destacado')->default(false);
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('venues');
    }
}
