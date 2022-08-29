<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //

    protected $table = 'alumnos';
    protected $fillable = [
        'Nom_alum',
        'Documentos',
        'acta_nacimiento',
        'curp',
        'carta_presentacion',
        'comprobante_domicilio',
        'boleta_calificaciones',
        'universidad',
        'Fk_ID_dependencia',
        'Fk_ID_carreras'
    ];
}
