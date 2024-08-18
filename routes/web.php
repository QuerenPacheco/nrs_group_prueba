<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::get('calidades/{proveedor_id}', [ClienteController::class, 'getCalidades']);

Route::resource('clientes', ClienteController::class);

Route::get('/exportarClientes', [ClienteController::class, 'exportarClientes']);

Route::resource('proveedores', ProveedorController::class);

Route::get('/exportarProveedores', [ProveedorController::class, 'exportarProveedores']);
