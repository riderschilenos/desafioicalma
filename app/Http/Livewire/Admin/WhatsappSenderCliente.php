<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitado;
use App\Models\Socio;
use App\Models\WhatsappMensaje;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class WhatsappSenderCliente extends Component
{   public $search, $nro;
    use WithPagination;

    public function render()
    {   $socios = Socio::join('users','socios.user_id','=','users.id')
        ->select('socios.*','users.name','users.email')
        ->where('rut','LIKE','%'. $this->nro .'%')
        ->orwhere('email','LIKE','%'. $this->nro .'%')
        ->orwhere('socios.name','LIKE','%'. $this->nro .'%')
        ->orwhere('socios.fono','LIKE','%'. $this->nro .'%')
        ->latest('id')
        ->paginate(7);
        $socios_all=Socio::all();

        $guess = Invitado::where('rut','LIKE','%'. $this->nro .'%')
                ->orwhere('email','LIKE','%'. $this->nro .'%')
                ->orwhere('name','LIKE','%'. $this->nro .'%')
                ->orwhere('fono','LIKE','%'. $this->nro .'%')
                ->latest('id')
                ->paginate(7);
        $guess_all=Invitado::all();


        return view('livewire.admin.whatsapp-sender-cliente',compact('socios','guess','socios_all','guess_all'));
       
    }

    public function invitacion(){
        
        
        $fono='569'.substr(str_replace(' ', '', $this->nro), -8);
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
            
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"Hola!! Hazte parte de la comunidad de RidersChilenos y aprovechar todos los beneficios de nuestra plataforma web, la cual es completamente gratuita y te permitirá registrar tu moto y/o bicicleta de una manera fácil y rápida, para mantener un registro online de mantenciones y servicios.
            Además, tendrás acceso a diferentes beneficios, como cupones de descuento en tiendas de bicicletas y motocicletas, ofertas exclusivas en productos y mucho más.
            Si estás interesado en registrarte y comenzar a disfrutar de todos estos beneficios, haz clic en el siguiente enlace y sigue los pasos para crear tu cuenta.
            https://riderschilenos.cl/register",
            'type'=>'enviado']);


        } catch (\Throwable $th) {
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"ERROR al enviar Mentaje => Hola!! Hazte parte de la comunidad de RidersChilenos y aprovechar todos los beneficios de nuestra plataforma web, la cual es completamente gratuita y te permitirá registrar tu moto y/o bicicleta de una manera fácil y rápida, para mantener un registro online de mantenciones y servicios.
            Además, tendrás acceso a diferentes beneficios, como cupones de descuento en tiendas de bicicletas y motocicletas, ofertas exclusivas en productos y mucho más.
            Si estás interesado en registrarte y comenzar a disfrutar de todos estos beneficios, haz clic en el siguiente enlace y sigue los pasos para crear tu cuenta.
            https://riderschilenos.cl/register",
            'type'=>'enviado']);
        }
    }

    public function carcasas(){
        $fono='569'.substr(str_replace(' ', '', $this->nro), -8);
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
                        'name'=>'catalogo_carcasas',
                        'language'=>[
                            'code'=>'es'],
                    
                    ]
                
            ];
            
            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
            
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"En el siguiente link encontrarás nuestro catálogo de carcasas con categorias de Motocross, MTB y Full Riders relacionadas. Escoge el diseño que más te guste y llena la plantilla que esta al inicio de cada catálogo. 

            https://riderschilenos.cl/catalogocarcasas",
            'type'=>'enviado']);


        } catch (\Throwable $th) {
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"ERROR al enviar Mentaje => En el siguiente link encontrarás nuestro catálogo de carcasas con categorias de Motocross, MTB y Full Riders relacionadas. Escoge el diseño que más te guste y llena la plantilla que esta al inicio de cada catálogo. 

            https://riderschilenos.cl/catalogocarcasas",
            'type'=>'enviado']);
        }
        
    }

    public function accesorios(){
        $fono='569'.substr(str_replace(' ', '', $this->nro), -8);
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
                        'name'=>'catalogo_accesorios',
                        'language'=>[
                            'code'=>'es'],
                    
                    ]
                
            ];
            
            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
            
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"Te dejamos el catálogo de accesorios en el siguiente link:

            https://clubriderschilenos.cl/catalogoportanumero.pdf
            Aquí te facilitamos una plantilla para escoger el diseño. Copiala, pegala y llena los siguientes datos:
            
            MARCA DISEÑO:
            N° DISEÑO:
            TU NOMBRE:
            TU NÚMERO:
            ACCESORIO: collar, llavero, colgante, stiker (elige uno)",
            'type'=>'enviado']);


        } catch (\Throwable $th) {
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"ERROR al enviar Mentaje => Te dejamos el catálogo de accesorios en el siguiente link:

            https://clubriderschilenos.cl/catalogoportanumero.pdf
            Aquí te facilitamos una plantilla para escoger el diseño. Copiala, pegala y llena los siguientes datos:
            
            MARCA DISEÑO:
            N° DISEÑO:
            TU NOMBRE:
            TU NÚMERO:
            ACCESORIO: collar, llavero, colgante, stiker (elige uno)",
            'type'=>'enviado']);
        }
    }

    public function polerones(){
        $fono='569'.substr(str_replace(' ', '', $this->nro), -8);
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
                        'name'=>'catalogo_polerones',
                        'language'=>[
                            'code'=>'es'],
                    
                    ]
                
            ];
            
            Http::withToken($token)->post('https://graph.facebook.com/'.$version.'/'.$phoneid.'/messages',$payload)->throw()->json();
            
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"En el siguiente link encontrarás nuestro catálogo de polerones. Escoge el diseño que más te guste y personalizalo a tu gusto, puedes cambiar nombre, numero y logotipos con la plantilla que esta al inicio del catálogo.

            https://riderschilenos.cl/catalogos/polerones.pdf",
            'type'=>'enviado']);


        } catch (\Throwable $th) {
            WhatsappMensaje::create(['numero'=> $fono,
            'mensaje'=>"ERROR al enviar Mentaje => En el siguiente link encontrarás nuestro catálogo de polerones. Escoge el diseño que más te guste y personalizalo a tu gusto, puedes cambiar nombre, numero y logotipos con la plantilla que esta al inicio del catálogo.

            https://riderschilenos.cl/catalogos/polerones.pdf",
            'type'=>'enviado']);
        }
    }

    public function updateinvitado_id($invitado_id){
        $invitado=Invitado::find($invitado_id);
        $this->nro = $invitado->fono;
        $this->search = $invitado->fono;
        return redirect()->to('#seccionDestino');
    }
    public function updatesocio_id($invitado_id){
        $invitado=Socio::find($invitado_id);
        $this->nro = $invitado->fono;
        $this->search = $invitado->fono;
        return redirect()->to('#seccionDestino');
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
