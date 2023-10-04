<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Fecha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

class FechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'fecha'=>'required',
            'lugar'=>'required',
            'file'=>'image'
        ]);

        $fecha = Fecha::create($request->all());
        $evento = Evento::find($request->evento_id);

        if($request->file('file')){
        
        $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
        $ruta = public_path().'/storage/eventos/'.$nombre;

        Image::make($request->file('file'))->orientate()
                ->resize(1200, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($ruta);
        $fecha->image()->create([
                    'url'=>'eventos/'.$nombre
                ]);
        }

        return redirect()->route('organizador.eventos.fechas',$evento);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fecha $fecha)
    {
        $fecha->update($request->all());
        $evento=Evento::find($fecha->evento_id);

        if($request->file('file')){
            $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
            $ruta = public_path().'/storage/eventos/'.$nombre;

            Image::make($request->file('file'))->orientate()
                    ->resize(600, 600 , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            
            if($fecha->image){
                Storage::delete($evento->image->url);
                $fecha->image()->update([
                        'url'=>'eventos/'.$nombre
                    ]);
                
            }else{
                $fecha->image()->create([
                    'url'=>'eventos/'.$nombre
                ]);
                }
            }

        return redirect()->route('organizador.eventos.fechas',$evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
