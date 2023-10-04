<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Video;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedSerie;
use App\Mail\RejectSerie;
use Illuminate\Support\Facades\Cache;


class SerieController extends Controller
{
    public function index(){

        $series = Serie::where('status',2)->paginate(8);

        return view('admin.series.index',compact('series'));
    }

    public function show(Serie $serie){

        $this->authorize('revision',$serie);

        $videos= Video::where('serie_id',$serie->id)
                        ->latest('id')
                        ->paginate();
        return view('admin.series.show',compact('serie','videos'));
    }

    public function approved(Serie $serie){

        $this->authorize('revision',$serie);

        if(!$serie->videos || !$serie->image){
            return back()->with('info','No se puede publicar una serie que no este completa');
        }
        

        $serie->status = 3;
        $serie->save();

        Cache::flush();

        //enviar mail
        $mail = new ApprovedSerie($serie); 
        Mail::to($serie->user->email)->queue($mail);


        return redirect()->route('admin.series.index')->with('info','La serie se publico con exito');
    }

    public function observation(Serie $serie){

        return view('admin.series.observation',compact('serie'));
    }

    public function reject(Request $request, Serie $serie){

        $request->validate([
            'body'=>'required'
        ]);

        $serie->observation()->create($request->all());
         
        $serie->status = 1;
        $serie->save();

        $mail = new RejectSerie($serie); 
        Mail::to($serie->user->email)->send($mail);

        return redirect()->route('admin.series.index')->with('info','La serie se ha rechazado con éxito');

    }
}
