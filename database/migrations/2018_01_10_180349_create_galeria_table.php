<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('venue_id');
            $table->longText('imagen1');
            $table->longText('imagen2')->nullable(true);
            $table->longText('imagen3')->nullable(true);
            $table->longText('imagen4')->nullable(true);
            $table->longText('imagen5')->nullable(true);
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
        Schema::dropIfExists('galeria');
    }
}
