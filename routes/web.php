<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\LocacaoController;


Route::get('/', function () {
    return view('welcome');
});


// Clientes
Route::resource('clientes', ClienteController::class);


// Veículos
Route::resource('veiculos', VeiculoController::class);


// Locações
Route::resource('locacoes', LocacaoController::class);


// Finalizar locação
Route::put(
    'locacoes/{locacao}/finalizar',
    [LocacaoController::class, 'finalizar']
)->name('locacoes.finalizar');