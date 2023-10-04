<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Invitado;
use Illuminate\Http\Request;

class InvitadoController extends Controller
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
        if($request->pedidoable_type=='App\Models\Invitado'){
                $request->validate([
                    'name'=>'required',
                    'rut'=>'required',
                    'fono'=>'required',
                    'email'=>'required'
                    ]);
        }

        $evento=Evento::find($request->evento_id);

            if($request->pedidoable_type == 'App\Models\Invitado'){
                
            
                $invitado =  Invitado::create([
                                'name'=> $request->name,
                                'rut'=> $request->rut,
                                'fono'=> $request->fono,
                                'email'=>$request->email]);
                            
              

                return redirect()->route('checkout.evento.invitado',compact('evento','invitado'));
                
        
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
    public function destroy($id)
    {
        //
    }
}
