<?php

use App\Http\Controllers\Socio\AuspiciadorController;
use App\Http\Controllers\Socio\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('auspiciadores', [HomeController::class,'index'])->name('index');

Route::get('{socio}', [HomeController::class,'show'])->name('show');

Route::get('socio/suscripcion', [HomeController::class,'create'])->middleware('auth')->name('create');

Route::post('socio/store', [HomeController::class,'store'])->name('store');

Route::post('{socio}/fotos', [HomeController::class,'fotos'])->name('fotos');

Route::get('{socio}/entrenamiento', [HomeController::class,'entrenamiento'])->name('entrenamiento');

Route::get('{socio}/tienda',[Homecontroller::class, 'showstore'])->name('store.show');

Route::get('{socio}/points',[Homecontroller::class, 'points'])->name('points');

Route::get('socio/{socio}/edit', [HomeController::class,'edit'])->name('edit');

Route::put('socio/{socio}/update', [HomeController::class,'update'])->name('update');

Route::resource('auspiciador', AuspiciadorController::class)->names('auspiciadors');
