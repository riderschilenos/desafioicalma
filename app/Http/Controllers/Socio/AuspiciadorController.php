<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use App\Models\Auspiciador;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;


class AuspiciadorController extends Controller
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
            'name'=>'required',
            'logo'=>'required',
            'beneficio'=>'required'  
           // 'slug'=>'required|unique:vehiculos',
        ]);

    
    $logo = Str::random(10).$request->file('logo')->getClientOriginalName();
    $rutalogo = public_path().'/storage/auspiciadores/'.$logo;
    $img=Image::make($request->file('logo'))->orientate()
            ->resize(400, null , function($constraint){
            $constraint->aspectRatio();
            })
            ->save($rutalogo);
    $img->orientate();
    
    $auspiciador=Auspiciador::create([
        'control' => TRUE,
        'name' => $request->name,
        'beneficio' => $request->beneficio,
        'logo'=>'auspiciadores/'.$logo,
        'auspiciadorable_id'=> $request->auspiciadorable_id,
        'auspiciadorable_type'=> $request->auspiciadorable_type
    ]);
   
    $socio= Socio::find($request->socio_id);

    return redirect()->route('socio.show',$socio);
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
    public function destroy(Auspiciador $auspiciador)
    {   
        Storage::delete($auspiciador->logo);
        $auspiciador->delete();
        
        return redirect()->route('socio.show',$auspiciador->user->socio);
    }
}
