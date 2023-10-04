<?php

namespace App\Http\Controllers;

use App\Models\WhatsappMensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller
{
    public function invitacion(Request $request){

        $num=$request->phone;
        
        $fono='569'.substr(str_replace(' ', '', $num), -8);
        //TOKEN QUE NOS DA FACEBOOK

        try {
            $token = env('WS_TOKEN');
            $phoneid= env('WS_PHONEID');
            $version='v16.0';
            $url="https://riderschilenos.cl/";
            $payload=[
                'messaging_product' => 'whatsapp',
                "preview_url"=> false,
                'to'=>$fono,
                
                'type'=>'template',
                    'template'=>[
                        'name'=>'invitacion_de_registro',
                        'language'=>[
                            'code'=>'es'],
                    
                    ]
                
            ];
            
            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
            
            return redirect()->back();

        } catch (\Throwable $th) {
             return redirect()->back();
        }
       
    }

    public function webhook(){
        //TOQUEN QUE QUERRAMOS PONER 
        $token = '#$23dfsD%6erter5sgSDF';
        //RETO QUE RECIBIREMOS DE FACEBOOK
        $hub_challenge = isset($_GET['hub_challenge']) ? $_GET['hub_challenge'] : '';
        //TOQUEN DE VERIFICACION QUE RECIBIREMOS DE FACEBOOK
        $hub_verify_token = isset($_GET['hub_verify_token']) ? $_GET['hub_verify_token'] : '';
        //SI EL TOKEN QUE GENERAMOS ES EL MISMO QUE NOS ENVIA FACEBOOK RETORNAMOS EL RETO PARA VALIDAR QUE SOMOS NOSOTROS
        if ($token === $hub_verify_token) {
            echo $hub_challenge;
            exit;
        }
      }
      /*
      * RECEPCION DE MENSAJES
      */
      public function recibe(){
        //LEEMOS LOS DATOS ENVIADOS POR WHATSAPP
        $respuesta = file_get_contents("php://input");
        //echo file_put_contents("text.txt", "Hola");
        //SI NO HAY DATOS NOS SALIMOS
        if($respuesta==null){
          exit;
        }
        //CONVERTIMOS EL JSON EN ARRAY DE PHP
        $respuesta = json_decode($respuesta, true);
        //EXTRAEMOS EL TELEFONO DEL ARRAY
        //GUARDAMOS EL MENSAJE Y LA RESPUESTA EN EL ARCHIVO text.txt
        WhatsappMensaje::create(['numero'=> $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from'],
                                'mensaje'=>$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body']]);
           
                                
            $num=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from'];
            
        try {
            //code...
        
            $fono='+569'.substr(str_replace(' ', '', $num), -8);
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
                        'name'=>'notificacion_mensaje',
                        'language'=>[
                            'code'=>'es'],
                        'components'=>[ 
                            [
                                'type'=>'body',
                                'parameters'=>[
                                    [   //fono
                                        'type'=>'text',
                                        'text'=> $fono
                                    ],
                                    [   //mensaje
                                        'type'=>'text',
                                        'text'=> $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body']
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
        
        } catch (\Throwable $th) {
            //throw $th;
        }
      }
    
    
}
