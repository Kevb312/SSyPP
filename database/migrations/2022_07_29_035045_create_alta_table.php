<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAltaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alta', function (Blueprint $table) {
            $table->id('ID_acep');

            #Llave foranea con alumnos
            $table->unsignedBigInteger('Fk_ID_alumno');
            $table->foreign('Fk_ID_alumno')
            ->references('ID_alum')
            ->on('alumnos');

            #Llave foranea con programas
            $table->unsignedBigInteger('Fk_ID_programa');
            $table->foreign('Fk_ID_programa')
            ->references('ID_programa')
            ->on('programas');

            #Llave foranea con dependencias
            $table->unsignedBigInteger('Fk_ID_dep');
            $table->foreign('Fk_ID_dep')
            ->references('ID_dep')
            ->on('dependencias');


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
        Schema::dropIfExists('alta');
    }
}
