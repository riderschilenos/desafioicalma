<?php

use App\Http\Controllers\Vehiculo\MantencionController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

Route::resource('mantencions', MantencionController::class )->names('mantencion');

Route::post('{vehiculo}/publicar', [VehiculoController::class,'publicar'])->middleware('auth')->name('publicar');

Route::post('{vehiculo}/inscribir', [VehiculoController::class,'inscribir'])->middleware('auth')->name('inscribir');

Route::post('{vehiculo}/activarqr', [VehiculoController::class,'activarqr'])->middleware('auth')->name('activarqr');

Route::redirect('', 'garage/usados');

Route::get('{vehiculo}/fotos', [VehiculoController::class,'imageupload'])->name('image');

Route::get('{vehiculo}/edit', [VehiculoController::class,'edit'])->name('edit');

Route::get('{vehiculo}/editusados', [VehiculoController::class,'editusados'])->name('edit.usados');

Route::post('{vehiculo}/update',[VehiculoController::class, 'update'])->name('vehiculo.update');


Route::post('{vehiculo}/upload', [VehiculoController::class,'upload'])->name('upload');

Route::get('{vehiculo}/comision', [VehiculoController::class,'comision'])->name('comision');

Route::get('{vehiculo}/inscripcion', [VehiculoController::class,'pagoinscripcion'])->middleware('auth')->name('inscripcion');

Route::put('{vehiculo}/precio', [VehiculoController::class,'precio'])->name('precioupdate');


Route::get('misvehiculos', [VehiculoController::class,'personalindex'])->middleware('auth')->name('vehiculos.index');


Route::get('{id}', [VehiculoController::class,'qrlink'])->name('qr.show');

Route::post('vehiculo/store', [VehiculoController::class,'store'])->name('vehiculo.store');


Route::get('vehiculo/create', [VehiculoController::class,'create'])->middleware('auth')->name('vehiculo.create');

