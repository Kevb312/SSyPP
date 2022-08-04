<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            "roles.Nombre_rol"   
        )
        ->leftjoin("roles", "roles.ID_rol", "=", "users.id")
        ->get();

        #Todos los roles
        $roles = Rol::get();
        return view("admin/users", compact('users', 'roles'));
    }
}
