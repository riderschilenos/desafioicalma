<?php

namespace App\Http\Controllers\Filmmaker;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Precio;
use Illuminate\Http\Request;
use App\Models\Serie;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

use Illuminate\Support\Facades\Cache;



class SerieController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer series')->only('index');
        $this->middleware('can:Crear series')->only('create','store');
        $this->middleware('can:Actualizar series')->only('edit','update');
        $this->middleware('can:Eliminar series')->only('destroy');
        
    }

    public function index()
    {
        return view('filmmaker.series.index');
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

        return view('filmmaker.series.create',compact('disciplinas','precios'));
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
            'titulo'=>'required',
            'slug'=>'required|unique:series',
            'subtitulo'=>'required',
            'descripcion'=>'required',
            'disciplina_id'=>'required',
            'precio_id'=>'required',
            'file'=>'image|max:2048'

        ]);

        $serie = Serie::create($request->all());

        Cache::flush();

        if($request->file('file')){
        
            $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
            $ruta = public_path().'/storage/series/'.$nombre;
    
            Image::make($request->file('file'))->orientate()
                    ->resize(600, 600 , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            $serie->image()->create([
                        'url'=>'series/'.$nombre
                    ]);
            }

        return redirect()->route('filmmaker.series.edit',$serie);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        return view('filmmaker.series.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie)
    {   
        $this->authorize('dicatated',$serie);

        $disciplinas= Disciplina::pluck('name','id');

        $precios= Precio::pluck('name','id');
        
        return view('filmmaker.series.edit', compact('serie','disciplinas','precios'));
    }

    public function videos(Serie $serie)
    {   
        $this->authorize('dicatated',$serie);

        $disciplinas= Disciplina::pluck('name','id');

        $precios= Precio::pluck('name','id');
        
        return view('filmmaker.series.videos', compact('serie','disciplinas','precios'));
    }

    public function sponsors(Serie $serie)
    {   
        $this->authorize('dicatated',$serie);

        $disciplinas= Disciplina::pluck('name','id');

        $precios= Precio::pluck('name','id');
        
        return view('filmmaker.series.sponsors', compact('serie','disciplinas','precios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie)
    {   
        $this->authorize('dicatated',$serie);

        $request->validate([
            'titulo'=>'required',
            'slug'=>'required|unique:series,slug,'.$serie->id,
            'subtitulo'=>'required',
            'descripcion'=>'required',
            'disciplina_id'=>'required',
            'precio_id'=>'required',
            'file'=>'image'

        ]);

        $serie->update($request->all());


        if($request->file('file')){
            $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
            $ruta = public_path().'/storage/series/'.$nombre;
    
            Image::make($request->file('file'))->orientate()
                    ->resize(600, 600 , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            
            if($serie->image){
                Storage::delete($serie->image->url);

                $serie->image->update([
                    'url'=>'series/'.$nombre
                ]);
            }else{
                $serie->image()->create([
                    'url'=>'series/'.$nombre
                ]);
                }
            }
        

        return redirect()->route('filmmaker.series.edit',$serie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        //
    }

    public function status(Serie $serie){
        $serie->status = 2;
        $serie->save();
        
        if($serie->observation){
        $serie->observation->delete();
        }

        return redirect()->route('filmmaker.series.edit',$serie);
    }

    public function observation(Serie $serie){
        return view('filmmaker.series.observation',compact('serie'));
    }
}
