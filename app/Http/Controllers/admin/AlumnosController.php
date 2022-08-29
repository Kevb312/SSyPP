<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumno;
use App\Carrera;
use App\Dependencia;

class AlumnosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAlumnos(){
        $dependencias = Dependencia::get();
        $carreras = Carrera::get();

        $alumnos = Alumno::Select()
        ->leftjoin("dependencias", "alumnos.Fk_ID_dependencia", "=", "dependencias.ID_dep")
        ->leftjoin("carreras", "alumnos.Fk_ID_carreras", "=", "carreras.ID_Carrera")
        ->get();
        
        #Regresamos a la vista
        return view("admin/alumnos", compact('alumnos', 'dependencias', 'carreras'));
    }

    public function createAlumno(Request $request){
        #Verificamos si en la db
        $verificarAlumno = 
        Alumno::where('Nom_alum', 'Like', '%' .  $request->InputNombreAlumno)
            ->count();
        #Sino existe entonces creamos al usuario
        try{
            if($verificarAlumno <= 0){
                #dd($request->file('inputDocumentos'));
                #if($request->file('inputDocumentos')){
                    
                    $file= $request->file('inputDocumentos'); #obtenemos la nueva imagen
                    $filename= date('YmdHi').$file->getClientOriginalName(); #Renombramos la imagen con la fecha como nombre
                    $file-> move(public_path('public/docs'), $filename); #Movemos la imagen
                #}else {
                #    return redirect()->route('getAlumnos');
                #}
                
                Alumno::create([
                    'Nom_alum' => strtoupper($request->InputNombreAlumno),
                    #'Documentos' => strtoupper($filename),
                    'Fk_ID_dependencia' => strtoupper($request->dependenciaId),
                    'Fk_ID_carreras' => strtoupper($request->carrerasId)
                ]);
                return redirect()->route('getAlumnos');
                

                
            }
            #Si ya existe simplemente redirigimos
            else if($verificarAlumno > 0){
                return redirect()->route('getAlumnos');
            }
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function deleteAlumno($id){
        Alumno::where('ID_alum', $id)->delete();

        return redirect()->route('getAlumnos');
    }

    public function updateAlumno(Request $request){
        try{

            if($request->file('InputDocs') != ""){
                #$file= $request->file('InputDocs'); #obtenemos la nueva imagen
                #$filename= date('YmdHi').$file->getClientOriginalName(); #Renombramos la imagen con la fecha como nombre
                #$file-> move(public_path('public/docs'), $filename); #Movemos la imagen

                Alumno::where("ID_alum", $request->IDhidden)
                ->update([
                    'Nom_alum' => strtoupper($request->InputNombreAlumnoEdit),
                    #'Documentos' => $filename,
                    'Fk_ID_dependencia' => strtoupper($request->InputDependenciaEdit),
                    'Fk_ID_carreras' => strtoupper($request->InputCarreraEdit)
                ]);

                
            }else{
                Alumno::where("ID_alum", $request->IDhidden)
                ->update([
                    'Nom_alum' => strtoupper($request->InputNombreAlumnoEdit),
                    'Fk_ID_dependencia' => strtoupper($request->InputDependenciaEdit),
                    'Fk_ID_carreras' => strtoupper($request->InputCarreraEdit)
                ]);
                
            }

            return redirect()->route('getAlumnos');

            
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}
