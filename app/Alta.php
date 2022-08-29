<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alta extends Model
{
    //
    protected $table = 'alta';
    protected $fillable = [
        'Fk_ID_alumno',
        'Fk_ID_programa',
        'Fk_ID_dep'
    ];
}
