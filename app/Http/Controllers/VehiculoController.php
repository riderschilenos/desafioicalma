<?php

namespace App\Http\Controllers;

//use App\Models\Image;

use App\Models\Disciplina;
use App\Models\Qrregister;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use App\Models\Vehiculo_type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class VehiculoController extends Controller
{   
    
    public function index(){
        
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

        return view('vehiculo.usados.index',compact('socio2','disciplinas','riders','series','autos'));
    }

    public function personalindex(){
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
        return view('vehiculo.garage.index',compact('socio2','disciplinas','riders','series','autos'));
    }
    
    public function registerindex(){

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

        return view('vehiculo.index',compact('socio2','disciplinas','riders','series','autos'));
    }
    

    public function create(){
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

        return view('vehiculo.garage.create',compact('series','riders','autos','socio2','disciplinas'));
    }

    public function vender(){
        
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

        return view('vehiculo.usados.create',compact('series','riders','autos','socio2','disciplinas'));
    }

    public function edit(Vehiculo $vehiculo){

        if($vehiculo->vehiculo_type_id==1 or $vehiculo->vehiculo_type_id==2 or $vehiculo->vehiculo_type_id==3 or $vehiculo->vehiculo_type_id==7){
            $disciplina_id=1;
        }

        if($vehiculo->vehiculo_type_id==9 or $vehiculo->vehiculo_type_id==10 or $vehiculo->vehiculo_type_id==11){
            $disciplina_id=2;
        }
        
        if($vehiculo->vehiculo_type_id==12 or $vehiculo->vehiculo_type_id==13 or $vehiculo->vehiculo_type_id==14){
            $disciplina_id=9;
        }

        return view('vehiculo.garage.edit',compact('vehiculo','disciplina_id'));
    }
    
    public function editusados(Vehiculo $vehiculo){

        if($vehiculo->vehiculo_type_id==1 or $vehiculo->vehiculo_type_id==2 or $vehiculo->vehiculo_type_id==3 or $vehiculo->vehiculo_type_id==7){
            $disciplina_id=1;
        }

        if($vehiculo->vehiculo_type_id==9 or $vehiculo->vehiculo_type_id==10 or $vehiculo->vehiculo_type_id==11){
            $disciplina_id=2;
        }
        
        if($vehiculo->vehiculo_type_id==12 or $vehiculo->vehiculo_type_id==13 or $vehiculo->vehiculo_type_id==14){
            $disciplina_id=9;
        }

        return view('vehiculo.usados.edit',compact('vehiculo','disciplina_id'));
    }
    public function update(Request $request, Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);


        $vehiculo->update($request->all());
        

        return redirect()->route('garage.image',$vehiculo);
    }

    public function show(Vehiculo $vehiculo){

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

        $qr=Qrregister::where('vehiculo_slug', $vehiculo->slug)->first();

        return view('vehiculo.garage.show',compact('vehiculo','qr','socio2','disciplinas','riders','series','autos'));
    }

    public function qrlink($id){

        $vehiculo=Vehiculo::where('slug',$id)->first();
        if ($vehiculo) {
            return redirect()->route('garage.vehiculo.show',$vehiculo);
        } else {
            $qr=Qrregister::where('slug',$id)->first();

            if ($qr) {
                if ($qr->vehiculo_slug) {
                    $vehiculo=Vehiculo::where('slug',$qr->vehiculo_slug)->first();
                    return redirect()->route('garage.vehiculo.show',$vehiculo);
                } else {
                    return view('errors.qr',compact('qr'));
                }
                
            } else {
                return view('errors.404');
            }
            
           
        }
        
       

     }

    public function store(Request $request)
    {   
        if($request->status==1){
            $request->validate([
                'marca_id'=>'required',
                'nombre'=>'required',
                'fono'=>'required',
                'ubicacion'=>'required',
               // 'slug'=>'required|unique:vehiculos',
    
            ]);
        }else{
            $request->validate([
                'marca_id'=>'required',
                'modelo'=>'required',
                'año'=>'required'
                
               // 'slug'=>'required|unique:vehiculos',
    
            ]);
        }

        

        $vehiculo = Vehiculo::create([
            'marca_id'=> $request->marca_id,
            'modelo'=> $request->modelo,
            'cilindrada'=> $request->cilindrada,
            'aro_front'=> $request->aro_front,
            'aro_back'=> $request->aro_back,
            'año'=> $request->año,
            'slug'=> Str::random(10),
            'status'=> $request->status,
            'precio'=> $request->precio,
            'descripcion'=> $request->descripcion,
            'property'=> $request->property,
            'nombre'=> $request->nombre,
            'nro_serie'=> $request->nro_serie,
            'fono'=> $request->fono,
            'email'=> $request->email,
            'ubicacion'=> $request->ubicacion,
            'user_id'=> $request->user_id,
            'vehiculo_type_id'=> $request->vehiculo_type_id
            ]);
        

   
            Cache::flush();

            try {
                $token = env('WS_TOKEN');
                $phoneid= env('WS_PHONEID');
                $version='v16.0';
                $url="https://riderschilenos.cl/";
                $wsload=[
                    'messaging_product' => 'whatsapp',
                    "preview_url"=> false,
                    'to'=>'56963176726',
                    
                    'type'=>'template',
                        'template'=>[
                            'name'=>'nuevo_vehiculo_registrado',
                            'language'=>[
                                'code'=>'es'],
                            'components'=>[ 
                                [
                                    'type'=>'body',
                                    'parameters'=>[
                                        [   //vehiculo
                                            'type'=>'text',
                                            'text'=> $vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año
                                        ],
                                        [   //dueño
                                            'type'=>'text',
                                            'text'=> $vehiculo->user->name
                                        ],
                                    ]
                                ]
                            ]
                        ]
                        
                    
                ];
                
                Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
                
                return redirect()->route('garage.image',$vehiculo);
    
            } catch (\Throwable $th) {
    
                return redirect()->route('garage.image',$vehiculo);
                
            }

           

    }

    public function comision(Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);

        if($vehiculo->image->count()){

            return view('vehiculo.usados.comision', compact('vehiculo'));
        }else{
            return redirect()->route('garage.image',$vehiculo)->with('info','No puedes avanzar sin haber subido al menos una imagen');
        }

        
        
    }

    public function pagoinscripcion(Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);

        if($vehiculo->image->count()){

            return view('vehiculo.garage.inscripcion', compact('vehiculo'));
        }else{
            return redirect()->route('garage.image',$vehiculo)->with('info','No puedes avanzar sin haber subido al menos una imagen');
        }

        
        
    }

    public function imageupload(Vehiculo $vehiculo)
    {   
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

        
        return view('vehiculo.fotos', compact('vehiculo','socio2','disciplinas','riders','series','autos'));
    }

    public function upload(Request $request, Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);
      /*    
        
        $request->validate([
            'file'=>'required|image|max: 9216'
        ]);

        $images = $request->file('file')->store('vehiculos');

        //$url = Storage::url($images);

        $vehiculo->image()->create([
            'url'=>$images
        ]);

        return redirect()->route('garage.image',$vehiculo);
     */
        $request->validate([
            'file'=>'required|image'
        ]);
        $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
        $ruta = public_path().'/storage/vehiculos/'.$nombre;
        Image::make($request->file('file'))->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($ruta);
        $vehiculo->image()->create([
                    'url'=>'vehiculos/'.$nombre
                ]);   

        return redirect()->route('garage.image',$vehiculo);

    }

    public function precio(Request $request, Vehiculo $vehiculo)
    {   
       

        $vehiculo->update($request->all());

        
        return redirect()->back();
        
    }

    public function publicar(Vehiculo $vehiculo)
    {   
        $vehiculo->status=5;

        $vehiculo->save();

        Cache::flush();

       
        return redirect()->route('garage.vehiculo.show',$vehiculo);
            
        

       
    }

    public function inscribir(Vehiculo $vehiculo)
    {   
        $vehiculo->status=6;

        $vehiculo->save();

        Cache::flush();

        return redirect()->route('garage.inscripcion',$vehiculo);
    }

    public function activarqr(Request $request, Vehiculo $vehiculo)
    {   
        $request->validate([
            'nro'=>'required',
            'pass'=>'required'

        ]);

        $qr=Qrregister::where('nro', $request->nro)->first();
       
        if($qr){
            if($qr->pass==$request->pass){
                if(is_null($qr->active_date)){
                    $qr->active_date=Carbon::now();
                    $qr->save();
                }else{
                    return redirect()->route('garage.inscripcion',$vehiculo)->with('info','El codigo QR ya esta en uso.');
                }
                $vehiculo->status=6;
                $qr->vehiculo_slug=$vehiculo->slug;
                if($qr->value==5000){
                    $vehiculo->insc=2;
                }else{
                    $vehiculo->insc=3;
                }

                $vehiculo->save();
                $qr->save();
                Cache::flush();

                return redirect()->route('garage.inscripcion',$vehiculo);
            } else{
                return redirect()->route('garage.inscripcion',$vehiculo)->with('info','NRO o PASS no coinciden.');;
            }
        }else{
            return redirect()->route('garage.inscripcion',$vehiculo)->with('info','NRO o PASS no coinciden.');;
        }
        
        
        
    }

    
    
}
