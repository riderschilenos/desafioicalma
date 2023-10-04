<?php

use App\Http\Controllers\Admin\CatalogoController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\SerieController;

use App\Http\Controllers\Admin\DisciplinaController;
use App\Http\Controllers\Admin\DisenoController;
use App\Http\Controllers\Admin\GastoController;
use App\Http\Controllers\Admin\GastotypesController;
use App\Http\Controllers\Admin\LoteController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\ModeloController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\PrecioController;
use App\Http\Controllers\Admin\QrregisterController;
use App\Http\Controllers\Admin\SmartphoneController;
use App\Http\Controllers\Admin\SocioController;
use App\Http\Controllers\Admin\SuscripcionController;
use App\Http\Controllers\Admin\Vehiculo_typeController;
use App\Http\Controllers\Admin\VehiculoController;
use App\Http\Controllers\Admin\VendedorsController;
use App\Http\Controllers\Vendedor\HomeController as VendedorHomeController;
use App\Http\Controllers\Vendedor\PagoController;

Route::get('/',[HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');

Route::resource('products', ProductController::class)->names('products');

Route::resource('disciplinas', DisciplinaController::class )->names('disciplinas');

Route::resource('pedidos', PedidoController::class )->names('pedidos');

Route::get('etiquetas/despacho',[PedidoController::class,'pdfetiquetas'])->name('generar.etiquetas');

Route::resource('precio', PrecioController::class)->names('precios');

Route::resource('vehiculotypes',Vehiculo_typeController::class)->names('vehiculotype');

Route::resource('vehiculo',VehiculoController::class)->names('vehiculo');

Route::resource('smartphone',SmartphoneController::class)->names('smartphone');

Route::resource('marca',MarcaController::class)->names('marcas');

Route::resource('diseno',DisenoController::class)->names('disenos');

Route::resource('lote',LoteController::class)->names('lotes');

Route::resource('gastos', GastoController::class)->names('gastos');

Route::resource('catalogos', CatalogoController::class)->names('catalogos');

Route::resource('gastotypes', GastotypesController::class)->names('gastotypes');

Route::get('produccion',[DisenoController::class, 'indexproduccion'])->name('disenos.produccion');

Route::resource('modelo',ModeloController::class)->names('modelos');

Route::resource('suscripcion',SuscripcionController::class)->names('suscripcions');

Route::get('{socio}/suscripcion',[SuscripcionController::class,'sociocreate'])->name('suscripcion.sociocreate');

Route::post('{socio}/suscripcionstore',[SuscripcionController::class,'store'])->name('suscripcion.sociostore');

Route::resource('qrregister',QrregisterController::class)->names('qrregister');

Route::get('{marca}/fotos', [Marcacontroller::class,'imageform'])->name('marca.imageform');

Route::post('{marca}/image',[MarcaController::class, 'image'])->name('marca.image');

Route::post('{marca}/catalogocarcasas',[MarcaController::class, 'catalogocarcasas'])->name('marca.catalogocarcasas');

Route::post('{marca}/catalogoaccesorios',[MarcaController::class, 'catalogoaccesorios'])->name('marca.catalogoaccesorios');

Route::post('{producto}/imagerepair',[ProductController::class, 'image'])->name('producto.imageup');

//Route::get('pagos/admin',[PagoController::class, 'adminindex'])->name('pagos.index');

Route::resource('pagos',PagoController::class)->names('pagos');

Route::resource('vendedors',VendedorsController::class)->names('vendedors');

Route::get('qrprinting',[QrregisterController::class, 'impresion'])->name('qrregister.impresion');

Route::post('{pago}/approved',[PagoController::class, 'pagoaprov'])->name('pago.approved');

Route::get('series',[SerieController::class, 'index'])->name('series.index');

Route::get('socios',[SocioController::class, 'index'])->name('socios.index');

Route::get('socios/{socio}/show',[SocioController::class, 'show'])->name('socios.show');

Route::get('series/{serie}',[SerieController::class,'show'])->name('series.show');

Route::post('series/{serie}/approved',[SerieController::class,'approved'])->name('series.approved');

Route::get('series/{serie}/observation',[SerieController::class,'observation'])->name('series.observation');

Route::post('series/{serie}/reject',[SerieController::class,'reject'])->name('series.reject');