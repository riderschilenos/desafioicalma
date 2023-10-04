<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gasto;
use App\Models\Image as ModelsImage;
use App\Models\Invitado;
use App\Models\Lote;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use PDF;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class PedidosProduccion extends Component
{   public $selected=[];

    public $selectedetiquetas=[];

    public $paginate=4;

    use WithFileUploads;

    use WithPagination;

    public $selectedProduccion, $selectedDescartar,$produccion, $descartar, $file, $etiquetas;

    public function render()
    {   $pedidos=Pedido::where('status',5)
        ->orwhere('status',6)
        ->orderby('status','DESC')
            ->paginate(100);

        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();
        $lotes=Lote::where('estado',1)->latest('id')->paginate($this->paginate);
        $alllotes=Lote::where('estado',2)->latest('id')->paginate($this->paginate);
        $ordens=Orden::all();

        $gastos=Gasto::where('user_id',auth()->user()->id)
                        ->where('gastotype_id',3)
                        ->orderby('id','DESC')
                        ->latest('id')
                        ->paginate(5);

        $gastosfull=Gasto::where('user_id',auth()->user()->id)
                        ->where('gastotype_id',3)
                        ->orderby('id','DESC')
                        ->latest('id')
                        ->get();
        

        return view('livewire.admin.pedidos-produccion',compact('gastosfull','ordens','pedidos','users','invitados','socios','lotes','alllotes','gastos'));
    }
    public function updateselectedproduccion(){

        $this->produccion= True;

        $this->reset(['descartar','etiquetas']);
    }


    public function updateselecteddescartar(){

        $this->descartar= True;
        $this->reset(['produccion','etiquetas']);
    }

    public function updateselectedetiquetas(){

        $this->etiquetas= True;
        $this->reset(['produccion','descartar']);
    }

    public function updatepaginate(){

        if ($this->paginate==4){
            $this->paginate=250;
        }else{
            $this->paginate=4;
     }
    }



    public function encaja()
    {   
        if($this->file){
                
            $foto = Str::random(10).$this->file->getClientOriginalName();
            $rutafoto = public_path().'/storage/ordens/'.$foto;
            $img=Image::make($this->file)->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();

        }else{
            $foto='nn';
        }

        foreach ($this->selected as $item){
            $orden = Orden::find($item);
            $orden->status = 3;
            $orden->save();
            if($foto!='nn'){
                $orden->images()->create([
                    'url'=>'ordens/'.$foto
                ]);
            }

            foreach($orden->pedido->ordens as $orden){

                if($orden->status==3){
                    $orden->pedido->status=6;
                    $orden->pedido->save();
    
                }else{
                    $orden->pedido->status=5;
                    $orden->pedido->save();
                    break;
                }

            } 
        }

        $this->reset(['selected','file']);
        
    }

    public function rediseñar()
    {

        foreach ($this->selected as $item){
            $orden = Orden::find($item);
            $orden->status = 1;
            $orden->save();
            
            
                    $orden->pedido->status=4;
                    $orden->pedido->save();
        }

        $this->reset(['selected']);
        
    }

    public function despachado(Pedido $pedido)
    {   
            
        if($this->file){
                
            $foto = Str::random(10).$this->file->getClientOriginalName();
            $rutafoto = public_path().'/storage/pedidos/'.$foto;
            $img=Image::make($this->file)->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();
            $pedido->image()->create([
                'url'=>'pedidos/'.$foto
            ]);

        }else{
            $foto='nn';
        }

        

        $pedido->status=7;
        $pedido->save();

        $valor=0;

        foreach ($pedido->ordens as $orden){
            $valor=$valor+1500;
        }

        $gasto=Gasto::create([
            'user_id'=> Auth()->user()->id,
            'metodo'=> 'TRANSFERENCIA',
            'estado'=> 1,
            'cantidad'=> $valor,
            'gastotype_id'=> 3 ]);
    
        foreach ($pedido->ordens as $orden){
            $gasto->ordens()->attach($orden);
            }

        if($pedido->pedidoable_type == 'App\Models\Invitado'){
            $cliente=Invitado::find($pedido->pedidoable_id);
        }else{
            $cliente=Socio::find($pedido->pedidoable_id);
        }

        try {
            $fono='569'.substr(str_replace(' ', '', $cliente->fono), -8);
       
            //TOKEN QUE NOS DA FACEBOOK
            $token = env('WS_TOKEN');
            $phoneid= env('WS_PHONEID');
            //$link= 'https://riderschilenos.cl/seguimiento/'.$pedido->id;
            $version='v16.0';
            $url="https://riderschilenos.cl/";
            $payload=[
                'messaging_product' => 'whatsapp',
                "preview_url"=> false,
                'to'=>$fono,
                
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
                                        'text'=> 'https://riderschilenos.cl/seguimiento/'.$pedido->id
                                    ]
                                ]
                            ]
                        ]
                    ]
                    
                
            ];
            
            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
    
    
            
             //TOKEN QUE NOS DA FACEBOOK
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
                         'name'=>'nro_seguimiento',
                         'language'=>[
                             'code'=>'es'],
                         'components'=>[ 
                            [
                                'type'=>'body',
                                'parameters'=>[
                                    [   //Link
                                        'type'=>'text',
                                        'text'=> 'https://riderschilenos.cl/seguimiento/'.$pedido->id
                                    ]
                                ]
                            ]
                         ]
                     ]
                     
                 
             ];
             
             Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
            
            
            $this->reset(['file']);
        } catch (\Throwable $th) {
           
            $this->reset(['file']);

        }
        
        
    }

    public function retirado(Pedido $pedido)
    {   
            
        

        $pedido->status=7;
        $pedido->save();

        $valor=0;

        foreach ($pedido->ordens as $orden){
            $valor=$valor+1500;
        }

        $gasto=Gasto::create([
            'user_id'=> Auth()->user()->id,
            'metodo'=> 'TRANSFERENCIA',
            'estado'=> 1,
            'cantidad'=> $valor,
            'gastotype_id'=> 3 ]);
    
        foreach ($pedido->ordens as $orden){
            $gasto->ordens()->attach($orden);
            }

        if($pedido->pedidoable_type == 'App\Models\Invitado'){
            $cliente=Invitado::find($pedido->pedidoable_id);
        }else{
            $cliente=Socio::find($pedido->pedidoable_id);
        }

        try {
            //TOKEN QUE NOS DA FACEBOOK
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
                     'name'=>'nro_seguimiento',
                     'language'=>[
                         'code'=>'es'],
                     'components'=>[ 
                        [
                            'type'=>'body',
                            'parameters'=>[
                                [   //Link
                                    'type'=>'text',
                                    'text'=> 'https://riderschilenos.cl/seguimiento/'.$pedido->id
                                ]
                            ]
                        ]
                     ]
                 ]
                 
             
         ];
         
         Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
        
        
        $this->reset(['file']);
        } catch (\Throwable $th) {
            $this->reset(['file']);
        }
        
        
        
    }

    public function download(Lote $lote){
        $pedido=$lote->ordens->first()->pedido;
        if($pedido->pedidoable_type == 'App\Models\Invitado'){
            $cliente=Invitado::find($pedido->pedidoable_id);
        }else{
            $cliente=Socio::find($pedido->pedidoable_id);
        }
        return response()->download(storage_path('app/public/'.$lote->resource->url),'Diseño '.$cliente->name.'.pdf');

    }

    public function close(Lote $lote){

        $lote->estado=2;
        $lote->save();
 
    }

    public function imagedestroy(ModelsImage $image){

        Storage::delete($image->url);
        $image->delete();
       
    }

}
