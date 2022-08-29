<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumno;
use App\Carrera;
use App\Dependencia;
use App\Programa;
use App\Alta;
class PublicController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    
    public function viewLicenciaturas(){
        return view('licenciaturas');
    }

    public function viewQuejasComentarios(){
        return view('sugges');
    }

    public function viewRegistro(){

        $carreras = Carrera::get();
        $dependencias = Dependencia::get();
        $programas = Programa::get();

        return view('registro', compact('carreras', 'dependencias', 'programas'));
    }

    public function guardarRegistroAlumno(Request $request){
        #Verificamos si en la db
        $verificarAlumno = 
        Alumno::where('Nom_alum', 'Like', '%' .  $request->Nombre)
            ->count();
        #Sino existe entonces creamos al usuario

        try{
            if($verificarAlumno <= 0){
                #acta de Nacimiento
                $fileActaNacimiento = $request->file('actaNacimiento');
                
                $filenameActaNacimiento= date('YmdHi').$fileActaNacimiento->getClientOriginalName(); 
                $fileActaNacimiento-> move(public_path('public/docs'), $filenameActaNacimiento); 

                #curp
                $fileCurp = $request->file('curp');
                $filenameCurp = date('YmdHi').$fileCurp->getClientOriginalName(); 
                $fileCurp-> move(public_path('public/docs'), $filenameCurp); 

                #carta de presentacion
                $fileCartaPresentacion = $request->file('cartaPresentacion');
                $filenameCarta = date('YmdHi').$fileCartaPresentacion->getClientOriginalName(); 
                $fileCartaPresentacion-> move(public_path('public/docs'), $filenameCarta);

                #Comprobante domicilio
                $fileComprobanteDomicilio = $request->file('comprobanteDomicilio');
                $filenameComprobante = date('YmdHi').$fileComprobanteDomicilio->getClientOriginalName(); 
                $fileComprobanteDomicilio-> move(public_path('public/docs'), $filenameComprobante);

                #Boleta calificaciones 
                $fileBoletaCali = $request->file('boletaCali');
                $filenameBoleta = date('YmdHi').$fileBoletaCali->getClientOriginalName(); 
                $fileBoletaCali-> move(public_path('public/docs'), $filenameBoleta);
                
                Alumno::create([
                    'Nom_alum' => strtoupper($request->Nombre),
                    'Documentos' => '',
                    'acta_nacimiento' => $filenameActaNacimiento,
                    'curp' => $filenameCurp,
                    'carta_presentacion' => $filenameCarta,
                    'comprobante_domicilio' => $filenameComprobante,
                    'boleta_calificaciones' => $filenameBoleta,
                    'universidad' => $request->Nomuni,
                    'Fk_ID_dependencia' => strtoupper($request->secreId),
                    'Fk_ID_carreras' => strtoupper($request->carrerasId)
                ]);

                if($request->programaId != ""){
                    $ultimoRegistro = Alumno::latest('ID_alum')->first();
                    Alta::create([
                        'Fk_ID_alumno' => $ultimoRegistro->ID_alum,
                        'Fk_ID_programa' => $request->programaId,
                        'Fk_ID_dep' => $request->secreId
                    ]);
                }

                return redirect()->route('registro')->with('success', true);
            }
            #Si ya existe simplemente redirigimos
            else if($verificarAlumno > 0){
                return redirect()->back()->with('error', true);
            }
        }
        catch (Exception $e){
            return redirect()->back()->with('error', true);
        }
    }
}
