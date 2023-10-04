<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogos=Catalogo::all();

        return view('admin.catalogos.index',compact('catalogos'));
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
            'imagen'=>'required'
           // 'slug'=>'required|unique:vehiculos',
        ]);

    
    $imagen = Str::random(10).$request->file('imagen')->getClientOriginalName();
    $rutalogo = public_path().'/storage/catalogos/'.$imagen;
    $img=Image::make($request->file('imagen'))->orientate()
            ->resize(1200, null , function($constraint){
            $constraint->aspectRatio();
            })
            ->save($rutalogo);
    $img->orientate();
    
    $catalogo=Catalogo::create([
        
        'name' => $request->name,
        'beneficio' => $request->beneficio,
        'auspiciadorable_id'=> $request->auspiciadorable_id,
        'auspiciadorable_type'=> $request->auspiciadorable_type,

        'imagen'=>'catalogos/'.$imagen,
    ]);
   

    return redirect()->route('admin.catalogos.index');
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
}
