<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Platform;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Transportista;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PedidoController extends Controller
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

    {   $transportistas = Transportista::pluck('name','id');
        
        if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',6)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(4);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
           $riders = Socio::join('users','socios.user_id','=','users.id')
            ->select('socios.*','users.name','users.email','users.updated_at')->where('status',1)
            ->orwhere('status',2)
            ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
            CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
            CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
            id DESC")->get()->take(4);
            Cache::put('riders',$riders);
         }

        if(auth()->user())
        {
        if(auth()->user()->socio)
        {
        $socio2 = Socio::where('user_id',auth()->user()->id)->first();
        }else{
        $socio2=null;
        }

        }
        else{
        $socio2=null;
        }

        $disciplinas= Disciplina::pluck('name','id');

        return view('vendedor.pedidos.create',compact('transportistas','series','riders','autos','socio2','disciplinas'));
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
            if ($request->invitado_status=='asociado') {     
                $request->validate([
                    'transportista_id'=>'required'
                    ]);
            }else{
                $request->validate([
                    'name'=>'required',
                    'rut'=>'required',
                    'fono'=>'required',
                    'email'=>'required',
                    'transportista_id'=>'required'
                    ]);
              
            }
        }else{
            $request->validate([
                'transportista_id'=>'required'
                ]);
        }

        if($request->pedidoable_type == 'App\Models\Invitado'){
                
            if ($request->invitado_status=='asociado') {
                $pedido = Pedido::create([
                    'user_id'=> $request->user_id,
                    'transportista_id'=> $request->transportista_id,
                    'pedidoable_id'=> $request->pedidoable_id,
                    'status'=>1,
                    'pedidoable_type'=> 'App\Models\Invitado']);
                 
                return redirect()->route('vendedor.pedidos.edit',$pedido);
             } else {
               
                $invitado =  Invitado::create([
                                'name'=> $request->name,
                                'rut'=> $request->rut,
                                'fono'=> $request->fono,
                                'email'=>$request->email]);
                            
                $pedido = Pedido::create([
                    'user_id'=> $request->user_id,
                    'transportista_id'=> $request->transportista_id,
                    'pedidoable_id'=> $invitado->id,
                    'status'=>1,
                    'pedidoable_type'=> $request->pedidoable_type]);

                return redirect()->route('vendedor.pedidos.edit',$pedido);
                
            }
            }
        else{
            $pedido = Pedido::create([
                'user_id'=> $request->user_id,
                'transportista_id'=> $request->transportista_id,
                'pedidoable_id'=> $request->pedidoable_id,
                'status'=>1,
                'pedidoable_type'=> $request->pedidoable_type]);

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

    public function seguimiento(Pedido $pedido)
    {   
        if(auth()->user()){
            return view('vendedor.pedidos.seguimiento',compact('pedido'));
        }else{
            return view('vendedor.pedidos.seguimientopublic',compact('pedido'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $invitados=Invitado::all();

        $socios=Socio::all();

        if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',6)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(4);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
           $riders = Socio::join('users','socios.user_id','=','users.id')
            ->select('socios.*','users.name','users.email','users.updated_at')->where('status',1)
            ->orwhere('status',2)
            ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
            CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
            CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
            id DESC")->get()->take(4);
            Cache::put('riders',$riders);
         }

        if(auth()->user())
        {
        if(auth()->user()->socio)
        {
        $socio2 = Socio::where('user_id',auth()->user()->id)->first();
        }else{
        $socio2=null;
        }

        }
        else{
        $socio2=null;
        }

        $disciplinas= Disciplina::pluck('name','id');

        return view('vendedor.pedidos.edit',compact('pedido','invitados','socios','series','riders','autos','socio2','disciplinas'));
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
        return redirect()->route('vendedor.home.index')->with('info','El pedido se elimino con éxito.');

    }

    public function close(Pedido $pedido){
        $pedido->status = 2;
        $pedido->save();

        return redirect()->route('vendedor.pedidos.prepay');
    }

    public function editing(Pedido $pedido){
        $pedido->status = 1;
        $pedido->save();

        return redirect()->route('vendedor.pedidos.edit',$pedido);
    }

    public function diseno(Pedido $pedido){

        $invitados=Invitado::all();

        $socios=Socio::all();

        if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',6)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(4);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
           $riders = Socio::join('users','socios.user_id','=','users.id')
            ->select('socios.*','users.name','users.email','users.updated_at')->where('status',1)
            ->orwhere('status',2)
            ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
            CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
            CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
            id DESC")->get()->take(4);
            Cache::put('riders',$riders);
         }

        if(auth()->user())
        {
        if(auth()->user()->socio)
        {
        $socio2 = Socio::where('user_id',auth()->user()->id)->first();
        }else{
        $socio2=null;
        }

        }
        else{
        $socio2=null;
        }

        $disciplinas= Disciplina::pluck('name','id');

        return view('vendedor.pedidos.diseno',compact('pedido','invitados','socios','series','riders','autos','socio2','disciplinas'));
    
    }
}
