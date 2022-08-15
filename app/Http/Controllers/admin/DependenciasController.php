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

    public function createDependencia(Request $request){
        #Verificamos si en la db
        $verificarDependencia = 
        Dependencia::where('Nom_dep', 'Like', '%' .  $request->InputNombre)
            ->count();
        #Sino existe entonces creamos al usuario
        try{
            if($verificarDependencia <= 0){
                Dependencia::create([
                    'Nom_dep' => strtoupper($request->InputNombre),
                    'Nom_secretaria' => strtoupper($request->InputSecretaria),
                    'Nom_sub' => strtoupper($request->InputSubSecre)
                ]);
                return redirect()->route('getDependencias');
            }
            #Si ya existe simplemente redirigimos
            else if($verificarDependencia > 0){
                return redirect()->route('getDependencias');
            }
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function updateDependencia(Request $request){
        try{

            Dependencia::where("ID_dep", $request->IDhidden)
            ->update([
                'Nom_dep' => $request->InputNameEdit,
                'Nom_secretaria' => $request->InputSecreEdit,
                'Nom_sub' => $request->InputSubSecreEdit
            ]);
            return redirect()->route('getDependencias');

            
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function deleteDependencia($id){
        
        Dependencia::where('ID_dep', $id)->delete();

        return redirect()->route('getDependencias');
    }
}
