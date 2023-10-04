<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $disciplinas=Disciplina::all();
        return view('admin.disciplinas.index',compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.disciplinas.create');
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
            'name'=>'required|unique:disciplinas'
        ]);

        $disciplina = Disciplina::create($request->all());

        return redirect()->route('admin.disciplinas.index')->with('info','La disciplina se creo con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        return view('admin.disciplinas.show',compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        return view('admin.disciplinas.edit',compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        $request->validate([
            'name'=>'required|unique:disciplinas,name,'.$disciplina->id
        ]);

        $disciplina->update($request->all());

        return redirect()->route('admin.disciplinas.index')->with('info','La disciplina se actualizo con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return redirect()->route('admin.disciplinas.index')->with('info','La disciplina se elimino con éxito.');

    }
}
