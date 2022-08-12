<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dependencia;
class DependenciasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDependencias(){
        #Todos las dependencias
        $dependencias = Dependencia::get();

        #Regresamos a la vista
        return view("admin/dependencias", compact('dependencias'));
    }
}
