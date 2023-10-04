<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;
use Illuminate\Support\Facades\Cache;           

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (auth()->user()) {

            if (auth()->user()->vendedor) {

                if(auth()->user()->vendedor->estado==2){

                    $autos = Vehiculo::where('status',4)
                    ->orwhere('status',5)
                    ->orwhere('status',7)
                    ->latest('id')->get()->take(3);

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
                    return view('vendedor.pedidos.index',compact('series','riders','autos','socio2','disciplinas'));
                    
                }else{
                    $disciplinas= Disciplina::pluck('name','id');
                    return view('vendedor.create',compact('disciplinas'));
                }
            }else{
                $disciplinas= Disciplina::pluck('name','id');
                return view('vendedor.create',compact('disciplinas'));
            }
            
        }else{
            $disciplinas= Disciplina::pluck('name','id');
            $id=10;
             return view('vendedor.create',compact('disciplinas','id'));
        }
        
    }

    public function prepay()
    {   if(Cache::has('autos')){
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
                       
        
        return view('vendedor.pedidos.prepay',compact('socio2','disciplinas','riders','series','autos'));
    }

    public function view_update(Vendedor $vendedor)
    {   
        if($vendedor->view==1){
            $vendedor->view=0;
            $vendedor->save();
        }else{
            $vendedor->view=1;
            $vendedor->save();
        }

        Cache::flush();
        /*
        //TOKEN QUE NOS DA FACEBOOK
        $token = env('WS_TOKEN');
        $phoneid= env('WS_PHONEID');
        $version='v16.0';
        $url="https://riderschilenos.cl/";
        $payload=[
            'messaging_product' => 'whatsapp',
            "preview_url"=> false,
            'to'=>'56963176726',
            
            'type'=>'template',
                'template'=>[
                    'name'=>'nro_seguimiento',
                    'language'=>[
                        'code'=>'es'],
                    'components'=>[ 
                        [
                            'type'=>'body',
                            'parameters'=>[
                                [   //Link
                                    'type'=>'text',
                                    'text'=> 'https://riderschilenos.cl/seguimiento/269'
                                ]
                            ]
                        ]
                    ]
                ]
                
            
        ];
        
        Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
*/
            
        return redirect()->route('vendedores.index');
    }

    public function comisiones()
    {   if(Cache::has('autos')){
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
        
        return view('vendedor.pedidos.comisiones',compact('socio2','disciplinas','riders','series','autos'));
    }

    public function precios()
    {                  
        $productos=Producto::all();
        return view('vendedor.pedidos.precios',compact('productos'));
    }

    public function catalogoscarcasas()
    {    if(Cache::has('autos')){
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

        return view('vendedor.catalogo.carcasas',compact('series','riders','autos','socio2','disciplinas'));
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
            'nro_cuenta'=>'required',
            'tipo_cuenta'=>'required',
            'rut'=>'required',
            'banco'=>'required',
            'name'=>'required',
            'fono'=>'required',
            'disciplina_id'=>'required',
            'localidad'=>'required',
        ]);

        $Vendedor = Vendedor::create([
            'nro_cuenta'=>$request->nro_cuenta,
            'tipo_cuenta'=>$request->tipo_cuenta,
            'rut'=>$request->rut,
            'banco'=>$request->banco,
            'user_id'=>$request->user_id,
            'biografia'=>'-',
            'name'=>$request->name,
            'fono'=>$request->fono,
            'view'=> 0,
            'disciplina_id'=>$request->disciplina_id,
            'localidad'=>$request->localidad,

        ]);

        return redirect()->route('vendedor.home.index');
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
    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();

        return redirect()->route('vendedor.home.index');
    }

    public function download_seguimiento(Pedido $pedido) {

        //return response()->download(storage_path('app/public/'.$pedido->image->url));


        view()->share('vendedor.pedidos.pdfseguimiento',$pedido);
 
         $pdf = PDF::loadView('vendedor.pedidos.pdfseguimiento', ['pedido' => $pedido]);
 
         return $pdf->download('numero_seguimiento.pdf');
    }
}
