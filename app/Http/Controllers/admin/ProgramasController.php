<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Programa;

class ProgramasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProgramas(){
        #Todos los programas
        $programas = Programa::get();

        #Regresamos a la vista con las variables que contienen usuarios y roles
        return view("admin/programas", compact('programas'));
    }

    public function createPrograma(Request $request){
        #Verificamos si ya existe el usuario en la db
        $verificarPrograma = 
        Programa::where('Numero', 'Like', '%' .  $request->InputNumero)
            ->count();
        #Sino existe entonces creamos al usuario
        try{
            if($verificarPrograma <= 0){
                Programa::create([
                    'Numero' => $request->InputNumero,
                    'Nombre_pro' => $request->InputName,
                    'ss_pp' => $request->InputSSPP,
                    'Antiguedad' => $request->AntiguedadName,
                    'Perfil' => $request->InputPerfil,
                    'Num_estad' => $request->InputNumEstado,
                ]);
                return redirect()->route('getProgramas');
            }
            #Si ya existe simplemente redirigimos
            else if($verificarPrograma > 0){
                return redirect()->route('getProgramas');
            }
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    #Metodo que actualiza un programa
    public function updatePrograma(Request $request){
        try{
            if(is_numeric($request->InputNameEdit)){
                Programa::where("ID_programa", $request->IDhidden)
                ->update([
                    'Numero' => $request->InputNumEdit,
                    'Nombre_pro' => $request->InputNameEdit,
                    'ss_pp' => $request->InputSsppEdit,
                    'Antiguedad' => $request->InputAntiguedadEdit,
                    'Perfil' => $request->InputPerfilEdit,
                    'Num_estad' => $request->InputNumEstEdit
                ]);
                return redirect()->route('getProgramas');
            }
            else{
                return redirect()->route('getProgramas');
            }
            
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    #Metodo para borrar un programa
    public function deletePrograma($id){
        Programa::where('ID_programa', $id)->delete();

        return redirect()->route('getProgramas');
    }
}
