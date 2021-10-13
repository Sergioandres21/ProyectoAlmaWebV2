<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('numeroIdentificacion')->unsigned();
            $table->primary('numeroIdentificacion');
            $table->foreignId('id_municipio')->constrained('municipios');
            $table->string('tipoDocumento', 2)->nullable();
            $table->string('nombres', 45);
            $table->string('apellidos', 40);
            $table->string('email', 45);
            $table->string('celular', 15)->unique();
            $table->string('direccionResidencia', 55)->nullable();
            $table->integer('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesionales');
    }
}
