<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_municipio')->constrained('municipios');
            $table->string('nombreSucursal');
            $table->string('direccion');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
}
