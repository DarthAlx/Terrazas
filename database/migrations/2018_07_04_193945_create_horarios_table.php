<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->integer('precio');
            $table->string('tipo');
            $table->string('zona');
            $table->bigInteger('capacidad');
            $table->bigInteger('venue_id');
            $table->bigInteger('user_id');
            $table->bigInteger('apartador')->nullable(true);
            $table->string('status')->default("disponible");
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
        Schema::dropIfExists('horarios');
    }
}
