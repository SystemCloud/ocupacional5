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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
//Rutas para perfiles
Route::get('/miPirfel','PerfilController@index');
Route::get('/miPirfel.changePassword','PerfilController@password');
Route::put('/perfil.update','PerfilController@update');

//RUTAS PARA CLINICAS
Route::resource('/clinicas','super\ClinicasController');
Route::get('/eliminarClinica/{id}','super\ClinicasController@eliminarClinica');
Route::post('/clinicaPagination', 'super\ClinicasController@pagination');

Route::resource('/tarifas','super\TarifasController');
Route::post('/tarifaPagination', 'super\TarifasController@pagination');
Route::get('/eliminarTarifa/{id}','super\TarifasController@eliminarTarifa');

Route::resource('/adminClinicas','super\AdminClinicasController');
Route::post('/adminClinicasPagination', 'super\AdminClinicasController@pagination');
Route::post('/adminClinicas/validarCorreo', 'super\AdminClinicasController@validarCorreo');
Route::get('/eliminarAdminClinicas/{id}','super\AdminClinicasController@eliminarAdminClinica');

Route::resource('/arrendamientos','super\ArrendamientosController');
Route::post('/arrendamientosPagination', 'super\ArrendamientosController@pagination');
Route::post('/arrendamientos/mostrarTarifa', 'super\ArrendamientosController@mostrarTarifas');
Route::get('/eliminarArrendamiento/{id}','super\ArrendamientosController@eliminarArrendamiento');
Route::get('/arrendamiento/{id}','super\ArrendamientosController@buscarTarifa');