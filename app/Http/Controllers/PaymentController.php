<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Invitado;
use App\Models\Orden;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Qrregister;
use App\Models\Retiro;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Suscripcion;
use App\Models\Ticket;
use App\Models\Vehiculo;
use App\Models\Vendedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Serie $serie){

        return view('payment.checkout',compact('serie'));
    }

    public function serie(Serie $serie, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $serie->sponsors()->attach(auth()->user()->id);
            return redirect()->route('series.status',$serie);
        }
        else{          
        }
    }

    public function checkoutticket(Ticket $ticket){
        
        $fechas= Fecha::where('evento_id',$ticket->evento->id)->paginate();

        if($ticket->ticketable_type == 'App\Models\Invitado'){
            $socio = Invitado::find($ticket->ticketable_id);
        
        }else{
            $socio = Socio::where('user_id',auth()->user()->id)->first();
        }

        $disciplinas= Disciplina::pluck('name','id');
        $evento=$ticket->evento;

        $alfa=0;     
      
        foreach ($ticket->inscripcions as $inscripcion){
                    
                            $alfa+=$inscripcion->fecha_categoria->inscripcion;
            }  
            
            $ticket->inscripcion=$alfa;
            $ticket->save();
        $fech = Fecha::where('evento_id',$evento->id)->first();

        return view('payment.checkoutticket',compact('ticket','disciplinas','fechas','socio','evento','fech'));
    }

    public function ticket(Ticket $ticket, Request $request){

        
        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $ticket->status=3;
            $ticket->save();
            foreach ($ticket->inscripcions as $inscripcion){
                $inscripcion->estado=3;
                $inscripcion->save();
            }  

        $evento=Evento::find($ticket->evento_id);

        //$evento->inscritos()->attach(auth()->user()->id);
        
        $tickets=$ticket->evento->tickets()->where('status','>=',3)->get();
        $retiros = Retiro::where('evento_id',$ticket->evento->id)->get();

        $total=0;
        $retiroacumulado=0;

        foreach ($retiros as $retiro){
                $retiroacumulado+=$retiro->cantidad;
        }
            

    

            foreach ($tickets as $ticket){
                    if($ticket->status>=3){
                            $total+=$ticket->inscripcion;
                    }
                
                }

        try {
                     //TOKEN QUE NOS DA FACEBOOK
                     $cell='569'.substr(str_replace(' ', '', $ticket->evento->user->vendedor->fono), -8);
            
                     //TOKEN QUE NOS DA FACEBOOK
                     $token = env('WS_TOKEN');
                     $phoneid= env('WS_PHONEID');
                     $version='v16.0';
                     $url="https://riderschilenos.cl/";
                     $payload=[
                     'messaging_product' => 'whatsapp',
                     "preview_url"=> false,
                     'to'=>$cell,
                     
                     'type'=>'template',
                         'template'=>[
                             'name'=>'entrada_vendida',
                             'language'=>[
                                 'code'=>'es'],
                             'components'=>[ 
                                 [
                                     'type'=>'body',
                                     'parameters'=>[
                                         [   //cliente
                                             'type'=>'text',
                                             'text'=> $ticket->user->name
                                         ],
                                         [   //Cantidad
                                             'type'=>'text',
                                             'text'=> '$'.number_format($ticket->inscripcion)
                                         ],
                                         [   //saldo
                                             'type'=>'text',
                                             'text'=> '$'.number_format($total*0.931-$retiroacumulado)
                                         ],
                                        
                                     ]
                                 ]
                             ]
                         ]
                     
                     ];
         
                     Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
                     
                     if($ticket->ticketable_type == 'App\Models\Invitado'){
                        $invitado=Invitado::find($ticket->ticketable_id);
                        $fono='569'.substr(str_replace(' ', '', $invitado->fono), -8);
                     } else {
                        $fono='569'.substr(str_replace(' ', '', $ticket->user->socio->fono), -8);
                     }
                     
                        

                     $token = env('WS_TOKEN');
                     $phoneid= env('WS_PHONEID');
                     $version='v16.0';
                     $url="https://riderschilenos.cl/";
                     $wsload=[
                         'messaging_product' => 'whatsapp',
                         "preview_url"=> false,
                         'to'=>$fono,
                         'type'=>'template',
                             'template'=>[
                                 'name'=>'entrada_comprada',
                                 'language'=>[
                                     'code'=>'es'],
                                 'components'=>[ 
                                     [
                                         'type'=>'body',
                                         'parameters'=>[
                                             [   //pista
                                                 'type'=>'text',
                                                 'text'=> $ticket->evento->titulo
                                             ],
                                             [   //Socio
                                                 'type'=>'text',
                                                 'text'=> 'https://riderschilenos.cl/ticket/view/'.$ticket->id
                                             ]
                                         ]
                                     ]
                                 ]
                             ]
                             
                         
                     ];
                     
                     Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$wsload)->throw()->json();
                     
            
            return redirect()->route('ticket.view',$ticket);
            
        } catch (\Throwable $th) {
             
            return redirect()->route('ticket.view',$ticket);
        }
        
         }
        else{
           
        }
    }

    public function socio(Socio $socio, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){

            $sus = Suscripcion::create([
                'suscripcionable_type'=>'App\Models\Socio',
                'suscripcionable_id'=>$socio->id,
                'precio'=>9990,
                'end_date'=>date('Y-m-d', strtotime(Carbon::now()."+ 1 year"))
            ]);

            $socio->status=1;
            $socio->save();

            $pedido = Pedido::create([
                'user_id'=> $socio->user_id,
                'transportista_id'=> 1,
                'pedidoable_id'=> $socio->id,
                'status'=> 4,
                'pedidoable_type'=> 'App\Models\Socio']);
            
            $orden= Orden::create([
                    'producto_id'=> 37,
                    'name'=>$socio->name,
                    'numero'=>$socio->nro,
                    'pedido_id'=>$pedido->id
                ]);

            return redirect()->route('socio.create');
        }
        else{
            
        }

    }
    public function vendedor(Vendedor $vendedor, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){

            $sus = Suscripcion::create([
                'suscripcionable_type'=>'App\Models\Vendedor',
                'suscripcionable_id'=>$vendedor->id,
                'precio'=>29990,
                'end_date'=>date('Y-m-d', strtotime(Carbon::now()."+ 2 year"))
            ]);

            $vendedor->estado=2;
            $vendedor->save();

            return redirect()->route('vendedores.index');
        }
        else{
            
        }

    }

    public function pago(Pago $pago, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $pago->estado=2;
            $pago->save();
            foreach ($pago->pedidos as $pedido){
                $pedido->status=4;
                $pedido->save();
            }

            return redirect()->route('vendedor.pedidos.prepay');
        }
        else{
            
        }

    }

    public function vehiculo(Vehiculo $vehiculo, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $vehiculo->status=4;
            $vehiculo->save();

            return redirect()->route('garage.usados');
        }
        else{
            
        }

        

      
    }

    public function vehiculoinsc(Vehiculo $vehiculo, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $vehiculo->status=6;
            if($vehiculo->insc==2){
                $value=5000;
            }else{
                $value=10000;
            }

            $qr=Qrregister::factory(1)->create([
                'value'=>$value,
                'active_date'=>Carbon::now()
            ]);

            $vehiculo->slug=$qr->first()->slug;

            $vehiculo->save();

            return redirect()->route('garage.inscripcion',$vehiculo);
        }
        else{
            
        }

        

      
    }


    public function vehiculodown(Vehiculo $vehiculo, Request $request){

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id"."?access_token=APP_USR-1229864100729203-011115-bb72bcc696b175468013c9b12f281869-74165380");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $vehiculo->status=1;
            $vehiculo->save();

            return redirect()->route('garage.vehiculos.index');
        }
        else{
            
        }

        

      
    }

    


}
