<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organizador.eventos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas= Disciplina::pluck('name','id');

        $precios= Precio::pluck('name','id');

        return view('organizador.eventos.create',compact('disciplinas','precios'));
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
            'type'=>'required',
            'titulo'=>'required',
            'subtitulo'=>'required',
            'descripcion'=>'required',
            'slug'=>'required|unique:eventos',
            'disciplina_id'=>'required',
            'file'=>'image'
        ]);

        $evento = Evento::create($request->all());


        if($request->file('file')){
        
        $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
        $ruta = public_path().'/storage/eventos/'.$nombre;

        Image::make($request->file('file'))->orientate()
                ->resize(600, 600 , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($ruta);
        $evento->image()->create([
                    'url'=>'eventos/'.$nombre
                ]);
        }
        if($request->type=="carrera"){
            Fecha::create([
                'evento_id'=>$evento->id,
                'name'=>$request->titulo
            ]);
        }


        return redirect()->route('organizador.eventos.edit',$evento);


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
    public function edit(Evento $evento)
    {
        $disciplinas= Disciplina::pluck('name','id');
        
        return view('organizador.eventos.edit', compact('evento','disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {

        $evento->update($request->all());

        if($request->file('file')){
            $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
            $ruta = public_path().'/storage/eventos/'.$nombre;

            Image::make($request->file('file'))->orientate()
                    ->resize(600, 600 , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            
            if($evento->image){
                Storage::delete($evento->image->url);
                $evento->image()->update([
                        'url'=>'eventos/'.$nombre
                    ]);
                
            }else{
                $evento->image()->create([
                    'url'=>'eventos/'.$nombre
                ]);
                }
            }

        return redirect()->back();
    }

    public function fechas(Evento $evento)
    {   

        return view('organizador.eventos.fechas', compact('evento'));
    }
    public function fechas_fast(Evento $evento)
    {   

        return view('organizador.eventos.fechasfast', compact('evento'));
    }

    public function categorias(Fecha $fecha)
    {   $evento=Evento::find($fecha->evento_id);
        

        return view('organizador.eventos.categorias', compact('evento','fecha'));
    }

    public function terminos(Evento $evento)
    {  
        return view('organizador.eventos.terminos', compact('evento'));
    }

    public function inscritos(Evento $evento)
    {  
        return view('organizador.eventos.inscritos', compact('evento'));
    }

    public function admin_inscritos(Evento $evento)
    {  
        return view('pistas.inscritos', compact('evento'));
    }

    public function retiros(Evento $evento)
    {  
        return view('organizador.eventos.retiros', compact('evento'));
    }

    public function admin_retiros(Evento $evento)
    {  
        return view('pistas.retiro', compact('evento'));
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
