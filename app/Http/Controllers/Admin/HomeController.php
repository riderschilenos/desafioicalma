<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use App\Models\Pago;
use App\Models\Retiro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Filmmaker;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
   public function index(){

      $gastos = Gasto::where('estado',1)->paginate(80);

      $retiros = Retiro::where('estado',1)->paginate(80);

      $pagos = Pago::where('estado',1)->paginate(80);

      return view('admin.index',compact('gastos','retiros','pagos'));
   }

   public function terminos(){
      
      return view('admin.terminos');
   }
   public function multimedia(){
      
      return view('admin.multimedia');
   }
  
   public function privacidad(){

      return view('admin.privacidad');
   }

   public function pagoqr(){
            if(Cache::has('autos')){
               $autos = Cache::get('autos');
         }else{
               $autos = Vehiculo::where('status',4)
                              ->orwhere('status',5)
                              ->orwhere('status',7)
                              ->latest('id')->get()->take(3);
               Cache::put('autos',$autos);
            }
         

         if(Cache::has('series')){
               $series = Cache::get('series');
         }else{
               $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(4);
               Cache::put('series',$series);
            }

         


         if(Cache::has('riders')){
               $riders = Cache::get('riders');
         }else{
              $riders = Socio::join('users','socios.user_id','=','users.id')
            ->select('socios.*','users.name','users.email','users.updated_at')->where('status',1)
            ->orwhere('status',2)
            ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
            CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
            CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
            id DESC")->get()->take(4);
               Cache::put('riders',$riders);
            }

         if(auth()->user())
         {
         if(auth()->user()->socio)
         {
         $socio2 = Socio::where('user_id',auth()->user()->id)->first();
         }else{
         $socio2=null;
         }

         }
         else{
         $socio2=null;
         }

         $disciplinas= Disciplina::pluck('name','id');
      return view('payment.pagocliente',compact('series','riders','autos','socio2','disciplinas'));
   }

   public function contabilidad(){
      if(Cache::has('autos')){
         $autos = Cache::get('autos');
      }else{
            $autos = Vehiculo::where('status',4)
                           ->orwhere('status',5)
                           ->orwhere('status',7)
                           ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }
      

      if(Cache::has('series')){
            $series = Cache::get('series');
      }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(4);
            Cache::put('series',$series);
         }

      


      if(Cache::has('riders')){
            $riders = Cache::get('riders');
      }else{
           $riders = Socio::join('users','socios.user_id','=','users.id')
            ->select('socios.*','users.name','users.email','users.updated_at')->where('status',1)
            ->orwhere('status',2)
            ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
            CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
            CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
            id DESC")->get()->take(4);
            Cache::put('riders',$riders);
         }

      if(auth()->user())
      {
      if(auth()->user()->socio)
      {
      $socio2 = Socio::where('user_id',auth()->user()->id)->first();
      }else{
      $socio2=null;
      }

      }
      else{
      $socio2=null;
      }

      $disciplinas= Disciplina::pluck('name','id');

      return view('admin.estadisticas',compact('series','riders','autos','socio2','disciplinas'));
   }

}
