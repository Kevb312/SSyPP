<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\RegisterController;
use App\User;
use App\Rol;

class UserController extends Controller
{
    //    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUsers(){
        #Todos los usuarios
        $users = User::select(
            "users.id",
            "users.name", 
            "users.email", 
            "users.Fk_ID_ROL",
            "roles.Nombre_Rol"   
        )
        ->leftjoin("roles", "roles.ID_rol", "=", "users.Fk_ID_ROL")
        ->get();
        
        #Todos los roles
        $roles = Rol::get();
        
        #Regresamos a la vista con las variables que contienen usuarios y roles
        return view("admin/users", compact('users', 'roles'));
    }

    #Metodo que actualiza un usuario
    public function updateUser(Request $request){
        User::where("id", $request->IDUsuariohidden)
            ->update([
                'name' => $request->InputNameEdit,
                'email' => $request->InputEmailEdit,
                'Fk_ID_ROL' => $request->InputRolEdit
            ]);
        return redirect()->route('getUsers');
    }

    #Metodo que valida el usuario a crear
    public function createUser(Request $request){
        
        #Verificamos si ya existe el usuario en la db
        $verificarUser = 
        User::where('email', 'Like', '%' .  $request->InputEmail)
            ->count();
        #Sino existe entonces creamos al usuario
        try{
            if($verificarUser <= 0){
                $crearUsuario =  new UserController;
                $crearUsuario->create($request);
                return redirect()->route('getUsers');
            }
            #Si ya existe simplemente redirigimos
            else if($verificarUser > 0){
                return redirect()->route('getUsers');
            }
        }
        catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

    }

    #Metodo que crea el usuario en la bd
    protected function create($data)
    {
        return User::create([
            'Fk_ID_ROL' => $data->InputRol,
            'name' => $data->InputName,
            'email' => $data->InputEmail,
            'password' => Hash::make($data->InputPass)
        ]);
    }

    #Metodo para borrar un usuario
    public function deleteUser($id){
        User::where('id', $id)->delete();

        return redirect()->route('getUsers');
    }
}
