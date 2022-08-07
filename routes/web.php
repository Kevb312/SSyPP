<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|////////////////////////////
| Rutas publicas
|///////////////////////////
| Rutas accesibles a todos los usuarios
|
*/
Route::get('/', function () {
    return view('welcome');
});

#Index
Route::get('', 'PublicController@index')->name('index');
#licenciaturas
Route::get('/licenciaturas', 'PublicController@viewLicenciaturas')->name('licenciaturas');



/*
|/////////////////////////
| Rutas de administración
|///////////////////////// 
| Solo se pueden acceder a estas rutas si estas logueado
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'Admin\HomeController@index')->name('HomeControllerAdmin');


/*
|-----------------------
|   USUARIOS
|-----------------------
*/
#Crea nuevo usuario
Route::post('admin/create-user', 'Admin\UserController@createUser')->name('createUser');
#Editar usuario
Route::post('admin/update-user', 'Admin\UserController@updateUser')->name('updateUser');
#Borrar usuario
Route::get('admin/delete-user/{id}', 'Admin\UserController@deleteUser')->name('deleteUser');
#Trae todos los usuarios
Route::get('admin/users', 'Admin\UserController@getUsers')->name('getUsers');


/*
|------------------------
|   ROLES
|------------------------
*/
#Crea nuevo rol
Route::post('admin/create-rol', 'Admin\RolesController@createRol')->name('createRol');
#Editar rol
Route::post('admin/update-rol', 'Admin\RolesController@updateRol')->name('updateRol');
#Trae todos los roles en el sistema
Route::get('admin/roles', 'Admin\RolesController@getRoles')->name('getRoles');


/*
|------------------------
|   PROGRAMAS
|------------------------
*/
#Crea nuevo programa
Route::post('admin/create-programa', 'Admin\ProgramasController@createPrograma')->name('createPrograma');
#Editar programa
Route::post('admin/update-programa', 'Admin\ProgramasController@updatePrograma')->name('updatePrograma');
#Borrar un programa
Route::get('admin/delete-programa/{id}', 'Admin\ProgramasController@deletePrograma')->name('deletePrograma');
#Trae todos los programas en el sistema
Route::get('admin/programas', 'Admin\ProgramasController@getProgramas')->name('getProgramas');