<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    //
    protected $table = 'programas';
    protected $fillable = [
        'Numero',
        'Nombre_pro',
        'ss_pp',
        'Antiguedad',
        'Perfil',
        'Num_estad'
    ];
}
