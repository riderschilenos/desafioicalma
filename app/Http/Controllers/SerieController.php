<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use App\Models\Video;


use Illuminate\Support\Facades\Cache;

class SerieController extends Controller
{
    public function index(){

        if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',6)
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

        return view('serie.index',compact('series','riders','autos','socio2','disciplinas'));
    }

    public function show(Serie $serie){

        $this->authorize('published',$serie);
        
        $videos= Video::where('serie_id',$serie->id)
                        ->paginate();
        $similares = Serie::where('disciplina_id',$serie->disciplina_id)
                            ->where('content','serie')
                            ->where('id','!=',$serie->id)
                            ->where('status',3)
                            ->latest('id')
                            ->take(5)
                            ->get();
        $autos = Vehiculo::where('status',4)
            ->orwhere('status',5)
            ->orwhere('status',7)
            ->latest('id')->get()->take(3);
                    
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

        return view('serie.show',compact('serie','videos','similares','series','riders','autos','socio2','disciplinas'));
    }

    public function enrolled(Serie $serie){
        $serie->sponsors()->attach(auth()->user()->id);

        return redirect()->route('series.status',$serie);
    }




}
