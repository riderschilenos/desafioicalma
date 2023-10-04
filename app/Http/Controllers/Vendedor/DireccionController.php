<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use App\Models\Pedido;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;

class DireccionController extends Controller
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
        'region'=>'required'
        
        ]);


        $direccion = Direccion::create([
            'calle'=>$request->calle,
            'numero'=>$request->numero,
            'block'=>$request->block,
            'comuna'=>$request->comuna,
            'region'=>$request->region,
            'direccionable_id'=> $request->direccionable_id,
            'direccionable_type'=> $request->direccionable_type
        ]);

        if($request->pedido_id=='suscripcion'){
            
                
                return redirect()->route('socio.create');
            }
            else{

                $pedido = Pedido::find($request->pedido_id);
                return redirect()->route('vendedor.pedidos.edit',$pedido);
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
    public function destroy(Direccion $direccion)
    {
        $direccion->delete();

        return redirect()->back();
    }
}
