<?php

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

Route::get('/', ['as' => 'principal', 'uses' => 'BackController@index']);
Auth::routes();
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('trabajadores', 'TrabajadoresController');
Route::resource('cursos', 'CursosController');
Route::resource('delegados', 'DelegadosController');
Route::resource('inspecciones', 'InspeccionesController');
Route::resource('notificaciones', 'NotificacionesController');
//Route::resource('politicas', 'PoliticasController');