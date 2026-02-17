<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::resource('cliente', ClienteController::class);
/*
Route::get('listarCliente', 'clienteController@show');
Route::get('criarCliente', 'clienteController@create');
Route::get('salvarCliente', 'clienteController@store');
Route::get('editarCliente', 'clienteController@edit');
Route::get('atualizarCliente', 'clienteController@update');
Route::get('removerCliente', 'clienteController@destroy');
*/
// Route::get('/', function () {
//     return view('welcome');
// });
