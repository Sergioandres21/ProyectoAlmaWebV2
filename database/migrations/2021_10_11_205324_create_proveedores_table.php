<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('numeroIdentificacion')->unsigned();
            $table->primary('numeroIdentificacion');
            $table->foreignId('id_municipio')->constrained('municipios');
            $table->string('tipoDocumento', 2)->nullable();
            $table->string('nombres', 45);
            $table->string('apellidos', 40);
            $table->string('email', 45);
            $table->string('telefono', 20)->nullable();
            $table->string('celular', 15)->unique();
            $table->string('direccionResidencia', 55)->nullable();
            $table->integer('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
