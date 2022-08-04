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


/*
|/////////////////////////
| Rutas de administración
|///////////////////////// 
| Solo se pueden acceder a estas rutas si estas logueado
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\HomeController@index')->name('HomeControllerAdmin');
/* usuarios*/
Route::get('users', 'Admin\UserController@getUsers')->name('getUsers');