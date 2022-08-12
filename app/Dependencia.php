<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    //
    protected $table = 'dependencias';
    protected $fillable = [
        'Nom_dep',
        'Nom_secretaria',
        'Nom_sub'
    ];
}
