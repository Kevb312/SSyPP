<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rol;

class RolesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRoles(){
        #Todos los roles
        $roles = Rol::get();

        #Regresamos a la vista con las variables que contienen usuarios y roles
        return view("admin/roles", compact('roles'));
    }

    #Metodo que crea un nuevo rol
    public function createRol(Request $request){
    
        #Verificamos si ya existe el usuario en la db
        $verificarRol = 
        Rol::where('Nombre_rol', 'Like', '%' .  $request->InputName)
            ->count();
        #Sino existe entonces creamos al usuario
        try{
            if($verificarRol <= 0){
                Rol::create([
                    'Nombre_rol' => $request->InputName
                ]);
                return redirect()->route('getRoles');
            }
            #Si ya existe simplemente redirigimos
            else if($verificarRol > 0){
                return redirect()->route('getRoles');
            }
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

    }

    #Metodo que actualiza un rol
    public function updateRol(Request $request){
        Rol::where("ID_rol", $request->IDhidden)
            ->update([
                'Nombre_Rol' => $request->InputNameEdit
            ]);
        return redirect()->route('getRoles');
    }
}
