<?php

namespace App\Http\Controllers\Vehiculo;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class MantencionController extends Controller
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
                'titulo'=>'required',
                'servicio'=>'required',
                'foto'=>'required'  
               // 'slug'=>'required|unique:vehiculos',
            ]);
        

        $vehiculo = Vehiculo::find($request->vehiculo_id);
 
        if($request->file('foto')){
            $foto = Str::random(10).$request->file('foto')->getClientOriginalName();
            $rutafoto = public_path().'/storage/mantencions/'.$foto;
            $img=Image::make($request->file('foto'))->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();
        }else{
            $foto='';
        }
        

        if($request->file('repuestos')){

            $repuestos = Str::random(10).$request->file('repuestos')->getClientOriginalName();
            $rutarepuestos = public_path().'/storage/mantencions/'.$repuestos;
  
            $img=Image::make($request->file('repuestos'))->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutarepuestos);
            $img->orientate();
                
        }else{
            $repuestos='';
        }
        if($request->file('comprobante')){

            $comprobante = Str::random(10).$request->file('comprobante')->getClientOriginalName();
            $rutacomprobante = public_path().'/storage/mantencions/'.$comprobante;
  
            $img=Image::make($request->file('comprobante'))->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutacomprobante);
            $img->orientate();
                
        }else{
            $comprobante='';
        }




        $vehiculo->mantencions()->create([
            'control' => 'TRUE',
            'titulo' => $request->titulo,
            'servicio' => $request->servicio,
            'user_id' => auth()->user()->id,
            'foto'=>'mantencions/'.$foto,
            'repuestos'=>'mantencions/'.$repuestos,
            'comprobante'=>'mantencions/'.$comprobante
           
        ]);

        
        return redirect()->route('garage.vehiculo.show',$vehiculo);
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
