<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Precio;


class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = Precio::all();

        return view('admin.precios.index',compact('precios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.precios.create');
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
            'name'=>'required|unique:precios',
            'value'=>'required|numeric'
        ]);

        $precio = Precio::create($request->all());

        return redirect()->route('admin.precios.index', compact('precio'))->with('info','El precio de creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Precio $precio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Precio $precio)
    {
        return view('admin.precios.edit',compact('precio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precio $precio)
    {
        $request->validate([
            'name'=>'required|unique:precios,name,'.$precio->id,
            'value'=>'required|numeric'
        ]);

        $precio->update($request->all());

        return redirect()->route('admin.precios.index', compact('precio'))->with('info','El precio de actualizó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precio $precio)
    {
        $precio->delete();

        return redirect()->route('admin.precios.index')->with('info','El precio de eliminó correctamente');
    }
}
