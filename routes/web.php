<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::get('calidades/{proveedor_id}', [ClienteController::class, 'getCalidades']);

Route::resource('clientes', ClienteController::class);
