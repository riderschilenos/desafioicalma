<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Organizador\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\StravaController;
use App\Http\Controllers\Ticket\EventoController;
use App\Http\Controllers\UsadoController;
use App\Http\Controllers\Vendedor\HomeController as VendedorHomeController;
use App\Http\Controllers\Vendedor\PedidoController;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\WhatsappController;
use App\Http\Livewire\EventoView;
use Illuminate\Support\Facades\Auth;


use App\Http\Livewire\SerieStatus;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('content', [SerieController::class,'index'])->name('series.index');

Route::get('vendedores', [VendedorHomeController::class,'index'])->name('vendedores.index');

Route::get('content/{serie}',[SerieController::class,'show'])->name('series.show');

Route::get('seguimiento/{pedido}',[PedidoController::class,'seguimiento'])->name('pedido.seguimiento');

Route::post('content/{serie}/enrolled', [SerieController::class, 'enrolled'])->middleware('auth')->name('serie.enrolled');

Route::post('evento/{evento}/enrolled', [EventoController::class, 'enrolled'])->middleware('auth')->name('evento.enrolled');

Route::get('serie-status/{serie}', SerieStatus::class)->name('series.status')->middleware('auth');

Route::get('evento-view/{user}', EventoView::class)->name('user.view')->middleware('auth');

Route::get('historial/ticket/{user}', [EventoController::class,'ticket_historial'])->name('ticket.historial.view')->middleware('auth');

Route::post('webhooks', WebhooksController::class);

Route::get('/webhook', [WhatsappController::class,'webhook']);

Route::post('/webhook', [WhatsappController::class,'recibe']);

Route::get('checkout/{evento}', [EventoController::class,'preticket'])->name('checkout.evento');

Route::get('checkout/{evento}/{invitado}', [EventoController::class,'preticketinv'])->name('checkout.evento.invitado');

Route::get('/catalogocarcasas',[VendedorHomeController::class, 'catalogoscarcasas'])->name('catalogo.carcasas');

Route::post('ticket/{ticket}/enrolled', [TicketController::class, 'enrolled'])->middleware('auth')->name('ticket.enrolled');

Route::post('ticket/{ticket}/semipago', [TicketController::class, 'semipago'])->middleware('auth')->name('ticket.semipago');

Route::get('/pagoqr',[AdminHomeController::class, 'pagoqr'])->name('pagosqr.cliente');

Route::get('/contabilidad',[AdminHomeController::class, 'contabilidad'])->middleware('auth')->name('contabilidad');

Route::get('{pedido}/seguimiento.pdf', [VendedorHomeController::class,'download_seguimiento'])->name('foto_seguimiento');

Route::get('/politica-de-privacidad',[AdminHomeController::class,'privacidad'])->name('politica.privacidad');

Route::get('/terminos-y-condiciones',[AdminHomeController::class,'terminos'])->name('terminos.condiciones');

Route::get('/multimedia',[AdminHomeController::class,'multimedia'])->name('multimedia');
 
Route::get('/login-google', [GoogleController::class,'login']);
 
Route::get('/google-callback', [GoogleController::class,'callback']);

Route::get('/redireccion-strava', [StravaController::class,'handleAuthorization']);