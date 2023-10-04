<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('{serie}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('{serie}/aproved', [PaymentController::class, 'serie'])->name('serie');

Route::get('{ticket}/prepay', [PaymentController::class, 'checkoutticket'])->name('checkout.ticket');

Route::get('{ticket}/active', [PaymentController::class, 'ticket'])->name('ticketaprov');

Route::get('{pago}/activepago', [PaymentController::class, 'pago'])->name('pago');

Route::get('{socio}/activesocio', [PaymentController::class, 'socio'])->name('socio');

Route::get('{vendedor}/vendedoractive', [PaymentController::class, 'vendedor'])->name('vendedor');

Route::get('{vehiculo}/publicar', [PaymentController::class, 'vehiculo'])->name('vehiculo');

Route::get('{vehiculo}/inscribir', [PaymentController::class, 'vehiculoinsc'])->name('vehiculo.inscribir');

Route::get('{vehiculo}/bajar', [PaymentController::class, 'vehiculodown'])->name('vehiculodown');