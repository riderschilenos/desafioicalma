<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socio;
use App\Models\Suscripcion;
use App\Models\User;
use App\Models\Vendedor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $socios=Socio::all();
        $vendedors=Vendedor::all();
        $suscripcions=Suscripcion::all();
        return view('admin.suscripcions.index',compact('suscripcions','socios','vendedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sociocreate(Socio $socio)
    {

        return view('admin.suscripcions.create',compact('socio'));
    }

    public function create(Socio $socio)
    {

        return view('admin.suscripcions.create',compact('socio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Socio $socio)
    {
        $socio->status=1;
        $socio->save();

            $sus = Suscripcion::create([
                'suscripcionable_type'=>'App\Models\Socio',
                'suscripcionable_id'=>$socio->id,
                'precio'=>$request->value,
                'end_date'=>date('Y-m-d', strtotime(Carbon::now()."+ ".$request->time." year"))
            ]);

            $socios=Socio::all();
            $suscripcions=Suscripcion::all();

            return redirect()->route('admin.suscripcions.index',compact('socios','suscripcions'))->with('info','La suscripción se creo con éxito.');
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
    public function destroy(Suscripcion $suscripcion)
    {
        $suscripcion->delete();
        $socios=Socio::all();
        $suscripcions=Suscripcion::all();
        
        return view('admin.suscripcions.index',compact('suscripcions','socios'))->with('info','La suscripcion se elimino con éxito.');
    }
}
