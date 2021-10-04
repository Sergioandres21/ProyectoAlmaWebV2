<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoAgendasTable extends Migration
{
    public function up()
    {
        Schema::create('estado_agendas', function (Blueprint $table) {
            $table->id();
            $table->string('NombreEstado');
            $table->integer('estadoAgenda');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estado_agendas');
    }
}
