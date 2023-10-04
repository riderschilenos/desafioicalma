<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Invitado;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use App\Models\WhatsappMensaje;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::where('estado',1)->paginate(80);
        $pagosok = Pago::where('estado',2)->paginate(80);

        return view('admin.pagos.index',compact('pagos','pagosok'));
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
            'metodo'=>'required',
            'cantidad'=>'required',
            'user_id'=>'required'
            ]);
        
        if($request->comprobante){
                
                $foto = Str::random(10).$request->file('comprobante')->getClientOriginalName();
                $rutafoto = public_path().'/storage/comprobantes/'.$foto;
                $img=Image::make($request->file('comprobante'))->orientate()
                    ->resize(400, null , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($rutafoto);
                $img->orientate();
                
            }else{
                $foto='';
            }
                $pago=Pago::create([
                'user_id'=> $request->user_id,
                'metodo'=> $request->metodo,
                'estado'=> $request->estado,
                'cantidad'=> $request->cantidad,
                'comprobante'=>'comprobantes/'.$foto]);

        
        foreach ($request->selected as $item){
            $pago->pedidos()->attach($item);
            $pedido = Pedido::find($item);
            $pedido->status = 3;
            $pedido->save();
            
            
            if($pedido->pedidoable_type == 'App\Models\Invitado'){
                $cliente=Invitado::find($pedido->pedidoable_id);
            }else{
                $cliente=Socio::find($pedido->pedidoable_id);
            }
            $user=User::find($pedido->user_id);
            
            $subtotal=0;

                    if($pedido->pedidoable_type=="App\Models\Socio"){
                        foreach ($pedido->ordens as $orden){
                            $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;
                        }
                    }
                    
                    if($pedido->pedidoable_type=="App\Models\Invitado"){
                        foreach ($pedido->ordens as $orden){
                            $subtotal+=$orden->producto->precio;
                        }
                    }
                    
             //TOKEN QUE NOS DA FACEBOOK
        $token = env('WS_TOKEN');
        $phoneid='100799979656074';
        $version='v16.0';
        $url="https://riderschilenos.cl/";
        $payload=[
            'messaging_product' => 'whatsapp',
            "preview_url"=> false,
            'to'=>'56963176726',
            
            'type'=>'template',
                'template'=>[
                    'name'=>'nuevo_pedido',
                    'language'=>[
                        'code'=>'es'],
                    'components'=>[ 
                        [
                            'type'=>'body',
                            'parameters'=>[
                                [   //cliente
                                    'type'=>'text',
                                    'text'=> $cliente->name
                                ],
                                [   //vendedor
                                    'type'=>'text',
                                    'text'=> $user->name
                                ],
                                [   //Cantidad
                                    'type'=>'text',
                                    'text'=> '$'.number_format($subtotal)
                                ]
                            ]
                        ]
                    ]
                ]
                
            
            
            /*
            "text"=>[
                "body"=> "Buena Rider, Bienvenido al club"
             ]*/
        ];
        
        Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();

        }
        
        return redirect()->route('vendedor.pedidos.prepay');
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
    public function destroy(Pago $pago)
    {
        
        if($pago->pedidos){
            foreach ($pago->pedidos as $pedido){
            $pedido->status = 2;
            $pedido->save();
        }}

        $pago->delete();

        return redirect()->route('admin.pagos.index');

    }

    public function adminindex()
    {   
        $pagos = Pago::where('estado',1)->paginate(80);
        $pagosok = Pago::where('estado',2)->paginate(80);

        return view('admin.pagos.index',compact('pagos','pagosok'));
    }
    
    public function pagoaprov(Request $request,Pago $pago){
            $pago->estado=2;
            $pago->cantidad=$request->cantidad;
            $pago->save();
            foreach ($pago->pedidos as $pedido){
                $pedido->status=4;
                $pedido->save();

                if($pedido->pedidoable_type == 'App\Models\Invitado'){
                    $cliente=Invitado::find($pedido->pedidoable_id);
                }else{
                    $cliente=Socio::find($pedido->pedidoable_id);
                }

                try {
                    $fono='569'.substr(str_replace(' ', '', $cliente->fono), -8);
                    //TOKEN QUE NOS DA FACEBOOK
                    $token = env('WS_TOKEN');
                    $phoneid='100799979656074';
                    $version='v16.0';
                    $url="https://riderschilenos.cl/";
                    $payload=[
                        'messaging_product' => 'whatsapp',
                        "preview_url"=> false,
                        'to'=>$fono,
                        'type'=>'template',
                            'template'=>[
                                'name'=>'diseno_pendiente',
                                'language'=>[
                                    'code'=>'es'],
                                'components'=>[ 
                                    [
                                        'type'=>'body',
                                        'parameters'=>[
                                            [   //Socio
                                                'type'=>'text',
                                                'text'=> $cliente->name
                                            ],
                                            [   //Socio
                                                'type'=>'text',
                                                'text'=> 'https://riderschilenos.cl/seguimiento/'.$pedido->id
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                            
                        
                    ];
                    
                    Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
                    
                    WhatsappMensaje::create(['numero'=> $fono,
                                'mensaje'=>'Hola '.$cliente->name.' Su pedido a sido ingresado a nuestro sistema, pronto recibirá el diseño para su aprobación antes de ser enviado al area de producción, en el siguiente link podra hacer seguimiento de su pedido https://riderschilenos.cl/seguimiento/'.$pedido->id.' Recuerde que cualquier duda que tenga solo debe contáctanos al whatsapp +56963176726',
                                'type'=>'enviado']);
                } catch (\Throwable $th) {
                    WhatsappMensaje::create(['numero'=> $fono,
                                'mensaje'=>'ERROR al enviar Mentaje => Hola '.$cliente->name.' Su pedido a sido ingresado a nuestro sistema, pronto recibirá el diseño para su aprobación antes de ser enviado al area de producción, en el siguiente link podra hacer seguimiento de su pedido https://riderschilenos.cl/seguimiento/'.$pedido->id.' Recuerde que cualquier duda que tenga solo debe contáctanos al whatsapp +56963176726',
                                'type'=>'enviado']);
                }
                

            }

            return redirect()->route('admin.pagos.index');
    
    }

}
