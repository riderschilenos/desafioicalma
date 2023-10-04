<?php

use App\Http\Controllers\Organizador\CategoriaController;
use App\Http\Controllers\Organizador\EventoController;
use App\Http\Controllers\Organizador\FechaController;
use App\Http\Controllers\Organizador\RetiroController;
use App\Http\Controllers\Organizador\TicketController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'organizador/eventos')->name('index');

Route::resource('evento', EventoController::class)->names('eventos');

Route::get('evento/{evento}/fechas',[EventoController::class, 'fechas'])->name('eventos.fechas');

Route::get('evento/{evento}/entrenamientos',[EventoController::class, 'fechas_fast'])->name('eventos.fechas.fast');

Route::get('fecha/{fecha}/categorias',[EventoController::class, 'categorias'])->name('eventos.categorias');

Route::get('evento/{evento}/terminos',[EventoController::class, 'terminos'])->name('eventos.terminos');

Route::get('evento/{evento}/inscritos',[EventoController::class, 'inscritos'])->name('eventos.inscritos');

Route::get('admin/evento/{evento}/inscritos',[EventoController::class, 'admin_inscritos'])->name('eventos.inscritos.fast');

Route::get('evento/{evento}/retiro',[EventoController::class, 'retiros'])->name('eventos.retiros');

Route::get('admin/evento/{evento}/retiro',[EventoController::class, 'admin_retiros'])->name('eventos.retiros.fast');

Route::resource('fecha', FechaController::class)->names('fechas');

Route::resource('categoria', CategoriaController::class)->names('categorias');

Route::resource('ticket', TicketController::class)->names('tickets');

Route::resource('retiro', RetiroController::class)->names('retiros');