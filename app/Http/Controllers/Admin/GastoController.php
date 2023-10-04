<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use App\Models\Gastotype;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = Gasto::where('estado',1)->paginate(80);
        $gastosok = Gasto::where('estado',2)->latest('id')->paginate(80);
        $vendedors= Vendedor::all();

        return view('admin.comisiones.index',compact('gastos','gastosok','vendedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $gastos = Gasto::where('estado',1)->paginate(80);
        $gastosok = Gasto::where('estado',2)->where('gastotype_id','>',3)->orderby('id','DESC')->paginate(80);
        $vendedors= Vendedor::all();
        $gastotypes=Gastotype::pluck('name','id');

        return view('admin.gastos.create',compact('gastos','gastosok','vendedors','gastotypes'));
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
        
        
        $gasto=Gasto::create([
                'user_id'=> $request->user_id,
                'metodo'=> $request->metodo,
                'estado'=> $request->estado,
                'cantidad'=> $request->cantidad,
                'detalle'=> $request->detalle,
                'gastotype_id'=> $request->gastotype_id]);


        if ($request->file) {
            $foto = Str::random(10).$request->file('file')->getClientOriginalName();
            $rutafoto = public_path().'/storage/comprobantes/'.$foto;
            $img=Image::make($request->file('file'))->orientate()
                ->resize(400, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();

            $gasto->update([
                'comprobante'=>'comprobantes/'.$foto,
            ]);    
        }

        if ($request->selected) {
            foreach ($request->selected as $item){
                $gasto->pedidos()->attach($item);
                $pedido = Pedido::find($item);
                $pedido->status = 8;
                $pedido->save();
            }

            return redirect()->route('vendedor.pedidos.comisiones');
        }
        else{
            return redirect()->route('admin.gastos.create');
        }
        
        
       
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
    public function update(Request $request, Gasto $gasto)
    {
        $request->validate([
            'comprobante'=>'required'
            ]);
        
        if($request->comprobante){
                
                $foto = Str::random(10).$request->file('comprobante')->getClientOriginalName();
                $rutafoto = public_path().'/storage/comprobantes/'.$foto;
                $img=Image::make($request->file('comprobante'))->orientate()
                    ->resize(400, null , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($rutafoto);
                $img->orientate();
                
            }else{
                $foto='';
            }
        
        foreach ($request->selected as $item){
                $gasto = Gasto::find($item);
                $gasto->update([
                    'comprobante'=>'comprobantes/'.$foto,
                    'estado'=>2
                ]);

                if ($gasto->gastotype_id==1) {
                    foreach ($gasto->pedidos as $pedido){
                        $pedido->status = 9;
                        $pedido->save();
                }
                
                }
            }
        

        
        
        
        return redirect()->route('admin.gastos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Gasto $gasto)
    {   
        foreach ($request->selected as $item){
            $gasto = Gasto::find($item);
            if ($gasto->gastotype_id==1) {
                if($gasto->pedidos){
                    foreach ($gasto->pedidos as $pedido){
                    $pedido->status = 7;
                    $pedido->save();
                }}
        
                $gasto->delete();
            }
        }
        
        

        return redirect()->route('admin.gastos.index');
    }
}
