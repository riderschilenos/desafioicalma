<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qrregister;
use App\Models\User;
use Illuminate\Http\Request;

class QrregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrregisters=Qrregister::all()->sortByDesc('proceso');
        return view('admin.qrregisters.index',compact('qrregisters'));
    }

    public function impresion()
    {
        $qrregisters=Qrregister::all()->sortByDesc('value');
                                
        return view('admin.qrregisters.impresion',compact('qrregisters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::pluck('name','id');

        return view('admin.qrregisters.create',compact('users'));
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
            'cant'=>'required|numeric|max:12',
            'type'=>'required'
        ]);
        Qrregister::factory($request->cant)->create([
            'value'=>$request->type
        ]);

        return redirect()->route('admin.qrregister.index')->with('info','Los codigos se crearon con éxito.');
       
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
    public function destroy(Qrregister $qrregister)
    {
        $qrregister->delete();
        return redirect()->route('admin.qrregister.index')->with('info','El qr a sido eliminado con éxito.');
    }
}
