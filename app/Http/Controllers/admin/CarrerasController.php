<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrera;
class CarrerasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getCarreras(){
        $carreras = Carrera::get();
        #Regresamos a la vista
        return view("admin/carreras", compact('carreras'));
    }

    public function createCarrera(Request $request){
        #Verificamos si en la db
        $verificarCarrera = 
        Carrera::where('Nom_carrera', 'Like', '%' .  $request->InputNombreCarrera)
            ->count();
        #Sino existe entonces creamos al usuario
        try{
            if($verificarCarrera <= 0){
                Carrera::create([
                    'Nom_area' => strtoupper($request->InputNombreArea),
                    'Facultad' => strtoupper($request->InputFacultad),
                    'Nom_carrera' => strtoupper($request->InputNombreCarrera)
                ]);
                return redirect()->route('getCarreras');
            }
            #Si ya existe simplemente redirigimos
            else if($verificarCarrera > 0){
                return redirect()->route('getCarreras');
            }
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function deleteCarrera($id){
        Carrera::where('ID_Carrera', $id)->delete();

        return redirect()->route('getCarreras');
    }

    public function updateCarrera(Request $request){
        try{

            Carrera::where("ID_Carrera", $request->IDhidden)
            ->update([
                'Nom_area' => strtoupper($request->InputNombreAreaEdit),
                'Facultad' => strtoupper($request->InputFacultadEdit),
                'Nom_carrera' => strtoupper($request->InputCarreraEdit)
            ]);
            return redirect()->route('getCarreras');

            
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}
