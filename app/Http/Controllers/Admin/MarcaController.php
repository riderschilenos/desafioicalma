<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas=Marca::all();

        return view('admin.marcas.index',compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $disciplinas= Disciplina::pluck('name','id');

        return view('admin.marcas.create',compact('disciplinas'));
    }

    public function imageform(Marca $marca)
    {   
        //$this->authorize('dicatated',$serie);

        
        return view('admin.marcas.image', compact('marca'));
    }

    public function catalogocarcasas(Request $request, Marca $marca)
    {   
        //$this->authorize('dicatated',$serie);

        $request->validate([
            'file'=>'required'
        ]);
        if($marca->catalogocarcasas){
            Storage::delete($marca->catalogocarcasas);
        }

        $foto = Str::random(10).$request->file('file')->getClientOriginalName();
        $rutafoto = public_path().'/storage/marcas/'.$foto;
        $img=Image::make($request->file('file'))->orientate()
            ->resize(600, null , function($constraint){
            $constraint->aspectRatio();
            })
            ->save($rutafoto);
        $img->orientate();

        $marca->update([
            'catalogocarcasas'=>'marcas/'.$foto,
        ]);    


        return redirect()->route('admin.marcas.index');

    }
    public function catalogoaccesorios(Request $request, Marca $marca)
    {   
        //$this->authorize('dicatated',$serie);

        $request->validate([
            'file'=>'required'
        ]);
        if($marca->catalogoaccesorios){
            Storage::delete($marca->catalogoaccesorios);
        }

        $foto = Str::random(10).$request->file('file')->getClientOriginalName();
        $rutafoto = public_path().'/storage/marcas/'.$foto;
        $img=Image::make($request->file('file'))->orientate()
            ->resize(600, null , function($constraint){
            $constraint->aspectRatio();
            })
            ->save($rutafoto);
        $img->orientate();

        $marca->update([
            'catalogoaccesorios'=>'marcas/'.$foto,
        ]);    


        return redirect()->route('admin.marcas.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $marca = Marca::create($request->all());

        return redirect()->route('admin.marcas.index')->with('info','La marca se creo con éxito.');  
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
    public function update(Request $request, $id)
    {
        //
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

    public function image(Request $request, Marca $marca)
    {   
        //$this->authorize('dicatated',$serie);
        
        
        $request->validate([
            'file'=>'required|image|max: 9216'
        ]);

        $images = $request->file('file')->store('marcas');

        if($marca->image){
            Storage::delete($marca->image->url);

            $marca->image->update([
                'url'=>$images
            ]);
        }else{
            $marca->image()->create([
                'url' => $images
                ]);
            }

        return redirect()->route('admin.marcas.index');

    }
    
}
