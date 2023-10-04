<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Invitado;
use App\Models\Retiro;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
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
        if($request->ticketable_type=='App\Models\Invitado'){
            $request->validate([
                'seleccionable'=>'required'
            ]);
            }else{
                $request->validate([
                    'seleccionable'=>'required'
                    ]);
            }
    
            if($request->ticketable_type == 'App\Models\Invitado'){
                  
                                
                    $ticket = Ticket::create([
                        'evento_id'=> $request->evento_id,
                        'ticketable_id'=> $request->ticketable_id,
                        'ticketable_type'=> $request->ticketable_type]);
                     
                    QrCode::format('svg')->size('300')->generate('https://riderschilenos.cl/ticket/view/'.$ticket->id, '../public/storage/qrcodes/cod'.$ticket->id.'.svg');
                
                    $ticket->update(['qr'=>'qrcodes/cod'.$ticket->id.'.svg']);
                    $ticket->save();
                    
                    $evento=Evento::find($request->evento_id);
    
                    return redirect(route('payment.checkout.ticket',$ticket).'/#pago');
               
                }
            else{
                
                

                $ticket = Ticket::create([
                    'user_id'=> $request->user_id,
                    'evento_id'=> $request->evento_id,
                    'ticketable_id'=> $request->ticketable_id,
                    'ticketable_type'=> $request->ticketable_type]);
                
                
                QrCode::format('svg')->size('300')->generate('https://riderschilenos.cl/ticket/view/'.$ticket->id, '../public/storage/qrcodes/cod'.$ticket->id.'.svg');
                
                $ticket->update(['qr'=>'qrcodes/cod'.$ticket->id.'.svg']);
                $ticket->save();
                
                $evento=Evento::find($request->evento_id);

                return redirect(route('payment.checkout.ticket',$ticket).'/#pago');
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
    public function destroy($id)
    {
        //
    }

    public function enrolled(Ticket $ticket){
        $ticket->inscripcion=0;
        $ticket->save();
        foreach($ticket->inscripcions() as $inscripcion){
            $inscripcion->cantidad=0;
            $inscripcion->save();
        }
        $evento=Evento::find($ticket->evento_id);
        $evento->inscritos()->attach(auth()->user()->id);
        
        return redirect()->route('ticket.view',$ticket);
    }

    public function semipago(Ticket $ticket){
        
        $ticket->status=3;
        $ticket->save();
        foreach ($ticket->inscripcions as $inscripcion){
            $inscripcion->estado=3;
            $inscripcion->save();
        }  

        $evento=Evento::find($ticket->evento_id);
        $evento->inscritos()->attach(auth()->user()->id);

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
            
            $fono='569'.substr(str_replace(' ', '', $ticket->user->socio->fono), -8);
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


}
