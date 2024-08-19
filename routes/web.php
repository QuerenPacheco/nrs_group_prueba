<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('calidades/{proveedor_id}', [ClienteController::class, 'getCalidades']);

Route::get('/exportarClientes', [ClienteController::class, 'exportarClientes']);


Route::get('proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');

Route::get('proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');

Route::post('proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');

Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');

Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');

Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

Route::get('/exportarProveedores', [ProveedorController::class, 'exportarProveedores']);
