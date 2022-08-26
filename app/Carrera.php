<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    protected $table = 'carreras';
    protected $fillable = [
        'Nom_area',
        'Facultad',
        'Nom_carrera'
    ];
}
