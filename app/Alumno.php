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
        'Fk_ID_dependencia',
        'Fk_ID_carreras'
    ];
}
