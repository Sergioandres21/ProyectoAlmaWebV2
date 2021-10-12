<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoagendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadoagendas', function (Blueprint $table) {
            $table->id();
            $table->string('NombreEstado')->unique();
            $table->integer('estadoAgenda');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estadoagendas');
    }
}
