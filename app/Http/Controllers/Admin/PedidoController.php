<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Socio;
use Illuminate\Http\Request;
use PDF;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pedidos.index');
    }

    public function pdfetiquetas(Request $request)
    {    
        $pedidos=Pedido::all();
        $socios=Socio::all();
        $invitados=Invitado::all();
        $etiquetas=$request->selectedetiquetas;
        $name='';
        foreach ($etiquetas as $item){
            $name=$name.'_'.$item;
        }

        // share data to view

        //$pdf = PDF::loadView('admin.pedidos.etiquetas', compact ('pedidos','etiquetas'));

        // download PDF file with download method


        return view('admin.pedidos.etiquetas', compact ('pedidos','etiquetas','socios','invitados'));
        //return $pdf->setpaper('a3','landscape')->stream('etiquetas_de_despacho'.$name.'.pdf');

        
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
        //
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
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('admin.pedidos.index')->with('info','El pedido se elimino con éxito.');

    }
}
