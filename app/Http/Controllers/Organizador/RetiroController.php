<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Retiro;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class RetiroController extends Controller
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
            'metodo'=>'required',
            'cantidad'=>'required'
            ]);
        
        
        Retiro::create([
                'user_id'=> $request->user_id,
                'metodo'=> $request->metodo,
                'estado'=> $request->estado,
                'cantidad'=> $request->cantidad,
                'evento_id'=> $request->evento_id
            ]);

            $evento = Evento::find($request->evento_id);

            return redirect()->back();
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
    public function update(Request $request, Retiro $retiro)
    {
        $request->validate([
            'comprobante'=>'required'
            ]);
        
        if($request->comprobante){
                
                $foto = Str::random(10).$request->file('comprobante')->getClientOriginalName();
                $rutafoto = public_path().'/storage/comprobantes/'.$foto;
                $img=Image::make($request->file('comprobante'))->orientate()
                    ->resize(600, null , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($rutafoto);
                $img->orientate();
                
            }else{
                $foto='';
            }
        
        foreach ($request->selected as $item){
                $gasto = Retiro::find($item);
                $gasto->update([
                    'comprobante'=>'comprobantes/'.$foto,
                    'estado'=>2
                ]);

             
            }
        

        return back()->with('info','El retiro a sido actualizado con éxito');
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
