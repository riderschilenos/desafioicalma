<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Filmmaker\SerieController;
use App\Http\Livewire\Filmmaker\SeriesSponsors;
use App\Http\Livewire\Filmmaker\SeriesVideos;

Route::redirect('/', 'filmmaker/series')->name('index');

Route::resource('serie', SerieController::class)->middleware('can:Actualizar series')->names('series');

Route::get('serie/{serie}/videos',[SerieController::class, 'videos'])->name('series.videos');

Route::get('serie/{serie}/sponsors',[SerieController::class, 'sponsors'])->middleware('can:Actualizar series')->name('series.sponsors');

Route::post('serie/{serie}/status',[SerieController::class, 'status'])->name('series.status');

Route::get('serie/{serie}/observation',[SerieController::class, 'observation'])->name('series.observation');