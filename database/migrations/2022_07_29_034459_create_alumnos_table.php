<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id('ID_alum');
            $table->string('Nom_alum');
            $table->string('Documentos');
            $table->string('acta_nacimiento');
            $table->string('curp');
            $table->string('carta_presentacion');
            $table->string('comprobante_domicilio');
            $table->string('boleta_calificaciones');
            $table->string('universidad');
            #Llave foranea con dependencias
            $table->unsignedBigInteger('Fk_ID_dependencia');
            $table->foreign('Fk_ID_dependencia')
            ->references('ID_dep')
            ->on('dependencias');

            #Llave foranea con carreras
            $table->unsignedBigInteger('Fk_ID_carreras');
            $table->foreign('Fk_ID_carreras')
            ->references('ID_Carrera')
            ->on('carreras');


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
        Schema::dropIfExists('alumnos');
    }
}
