<div>
    

<script>//<![CDATA[
function getlink() {
var aux = document.createElement("input");
aux.setAttribute("value", window.location.href.split("?")[0].split("#")[0]);
document.body.appendChild(aux);
aux.select();
document.execCommand("copy");
document.body.removeChild(aux);
var css = document.createElement("style");
var estilo = document.createTextNode("#aviso {position:fixed; z-index: 9999999; widht: 120px; top:30%;left:50%;margin-left: -60px;padding: 20px; background: gold;border-radius: 8px;font-size: 14px;font-family: sans-serif;}");
css.appendChild(estilo);
document.head.appendChild(css);
var aviso = document.createElement("div");
aviso.setAttribute("id", "aviso");
var contenido = document.createTextNode("URL copiada");
aviso.appendChild(contenido);
document.body.appendChild(aviso);
window.load = setTimeout("document.body.removeChild(aviso)", 2000);
}
//]]></script>
<div class="hidden sm:block">
    <div class="flex justify-end">
        <a class="btn btn-danger flex" href='javascript:getlink();'><img class="h-4 w-4 mt-1 mr-2" src="https://img.icons8.com/ios-filled/50/ffffff/copy.png"/> Copiar URL</a>
    </div>
</div>

<style>

    @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>

       @if ($pedido->status>=7)
          @if ($pedido->image)
              <div class="min-w-screen min-h-screen bg-yellow-300 flex items-center py-2 lg:p-10 overflow-hidden relative">
                <div class="w-full max-w-6xl rounded bg-white shadow-xl p-2 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                    <div class="md:flex items-center mx-10  p-2">
                        <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                            <div class="relative">
                                <img src="{{Storage::url($pedido->image->url)}}" class="h-48 relative z-10" alt="">
                                <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-10">
                            <div class="mb-10 ml-4">
                                <h1 class="font-bold uppercase text-2xl mb-5 text-center">Pedido Nro: {{$pedido->id}}</h1>
                              
                            </div>

                        </div>
                    </div>
                </div>
              </div>
          @endif
       @endif
      

<h1 class="text-3xl text-center font-bold mb-6 mt-6">
  @switch($pedido->status)
                                    @case(1)
                                            Borrador
                                        @break
                                    @case(2)
                                            Pendiente de Pago
                                        @break
                                    @case(3)
                                            Procesando Pago
                                      
                                        @break
                                    @case(4)
                                            Pendiente de Diseño
                                    
                                        @break
                                      @case(5)
                                            Pendiente de Producción
                                       
                                        @break
                                      @case(6)
                                            Pendiente de Despacho
                                     
                                        @break
                                      @case(7)
                                            Despachado
                                        
                                        @break
                                      @case(8)
                                            Despachado
                                        
                                        @break
                                      @case(9)
                                            Despachado
                                    
                                    @break
                                    @default
                                        
                                  @endswitch
                                </h1>

<h1 class="text-xl text-center font-bold pb-4">Estado del Pedido<br>Nro: {{$pedido->id}}</h1>
        
    <div class="w-full pt-2 pb-2">
        <div class="flex">
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                <span class="text-center text-white w-full">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path>
                    </svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">Recepción del Pedido</div>
          </div>
      
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                  <div class="w-0 bg-green-300 py-1 rounded transition-all duration-500" style="width: @if($pedido->status>4) 100% @elseif($pedido->status==4)50% @else 0% @endif;"></div>
                </div>
              </div>
      
              <div class="w-10 h-10 mx-auto @if($pedido->status < 5 ) bg-white @else bg-green-500 @endif border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center @if($pedido->status < 5) text-gray-600 @else text-white @endif w-full">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">Diseño</div>
          </div>
      
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                  <div class="w-0 bg-green-300 py-1 rounded" style="width: @if($pedido->status==5) 50% @elseif($pedido->status>5) 100% @else 0% @endif;"></div>
                </div>
              </div>
      
              <div class="w-10 h-10 mx-auto @if($pedido->status < 6 ) bg-white @else bg-green-500 @endif border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center @if($pedido->status < 6) text-gray-600 @else text-white @endif w-full">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">Produccion</div>
          </div>
      
          <div class="w-1/4">
            <div class="relative mb-2">
              <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                  <div class="w-0 bg-green-300 py-1 rounded" style="width: @if($pedido->status==6) 50% @elseif($pedido->status>6) 100% @else 0% @endif ;"></div>
                </div>
              </div>
      
              <div class="w-10 h-10 mx-auto @if($pedido->status < 7 ) bg-white @else bg-green-500 @endif border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                <span class="text-center @if($pedido->status < 7) text-gray-600 @else text-white @endif w-full">
                  <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
                  </svg>
                </span>
              </div>
            </div>
      
            <div class="text-xs text-center md:text-base">@if($pedido->status < 7) Despacho  @else Despachado @endif</div>
          </div>
        </div>
    </div>

                          
     

                        <div class="max-w-7xl mx-auto pb-6 px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
                            @foreach ($pedido->ordens as $orden)
                                @foreach ($orden->images as $image)
                                    <img class="h-26 w-32 object-contain justify-center mx-auto" src=" {{Storage::url($image->url)}}" alt="">
                                @endforeach()
                            @endforeach

                            
                        </div>
        
<div x-data="{open: true}">
    <div class="text-center md:hidden" >
        <h1 class="text-xl font-bold">INFORMACIÓN DEL PEDIDO</h1>

        <h1 class="ml-auto text-sm font-bold cursor-pointer text-blue-500" x-on:click="open=!open">(VER INFORMACIÓN)</h1>
    </div>
    <div class="hidden md:flex" >
      <h1 class="text-xl font-bold">INFORMACIÓN DEL PEDIDO</h1>

      <h1 class="ml-auto text-sm font-bold cursor-pointer text-blue-500" x-on:click="open=!open">(VER INFORMACIÓN)</h1>
    </div>


    <hr class="mt-2 mb-6">
    
    <div class="max-w-7xl px-4 sm:px-6 lg:px-2 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-x-2 gap-y-2" x-show="open">
     

        @if ($pedido->pedidoable_type == "App\Models\Invitado")
            @foreach ($invitados as $invitado)
                @if ($invitado->id == $pedido->pedidoable_id )
                    <div class="mb-6 flex">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-4">
                        <div>
                                <p class="font-bold mr-4">Nombre:</p>{{$invitado->name}}
                                <span class="ml-2 px-2 inline-flex text-xs leading-5 items-center font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Invitado
                                </span>
                        </div>
                        <p class="ml-auto mr-4"><b>Rut:</b> {{$invitado->rut}}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        @if ($pedido->pedidoable_type == "App\Models\Socio")
            @foreach ($socios as $socio)
                @if ($socio->id == $pedido->pedidoable_id )
                <div class="mb-6 flex">
                      <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-4">
                        <div>
                            <p class="mr-4"><b>Nombre:</b></p>{{$socio->user->name}}
                            <span class="ml-2 px-2 inline-flex text-xs leading-5 items-center font-semibold rounded-full bg-green-100 text-green-800">
                                Socio
                            </span>
                        </div>
                        <div>
                          <p class="mr-4"><b>Rut:</b>   {{$socio->rut}}</p>
                        </div>
                       </div>
                      </div>
                @endif
            @endforeach
        @endif

    </div>



    
<div x-show="open">
   
        @if ($pedido->pedidoable_type == "App\Models\Invitado")
            @foreach ($invitados as $invitado)
                @if ($invitado->id == $pedido->pedidoable_id )
                    @if ($invitado->direccion)

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-y-4" name="datosdireccioninvitado">
                            <div>
                                <p class="font-bold mr-2s">Comuna: </p>{{$invitado->direccion->comuna}}
                            </div>
                            <div>
                                <p class="font-bold mr-2s">Calle: </p>{{$invitado->direccion->calle}}
                            </div>
                            <div>
                                <p class="font-bold mr-2s">Nro: </p>{{$invitado->direccion->numero}}
                            </div>
                            <div>
                                <p class="font-bold mr-2">{{$invitado->direccion->region}}</p>
                            </div>
                            <div>
                                @switch($pedido->transportista->id)
                                      @case(1)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                      @case(2)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                        @case(3)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                     
                                      @default
                                          
                                @endswitch
                                
                            </div>    
                        </div>
                        
                        <div class="mt-4 mb-20" name="productos">
                            @livewire('vendedor.pedidos-ordens', ['pedido' => $pedido], key('pedidos-ordens.'.$pedido->id))
                        </div>

                        
                        
                        
                    @else

                        <div name="formulariodireccioninvitados">
                            <h1 class="text-xl font-bold text-red-500 text-center mb-6"> Debes ingresar una dirección de despacho antes de agregar los productos al pedido</h1>
            
                            
                            {!! Form::open(['route' => 'vendedor.direccions.store']) !!}

                            {!! Form::hidden('pedido_id', $pedido->id ) !!}
                    
                            {!! Form::hidden('direccionable_id', $pedido->pedidoable_id ) !!}

                            {!! Form::hidden('direccionable_type','App\Models\Invitado') !!}
                            
                            @include('vendedor.pedidos.partials.formdirection')
                    
                    
                            <div class="flex justify-end">
                                <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                                {!! Form::submit('Agregar Dirección', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                            </div>
                    
                            {!! Form::close() !!}
                        </div>



                    @endif
                @endif
            @endforeach
        @endif

        @if ($pedido->pedidoable_type == "App\Models\Socio")
            @foreach ($socios as $socio)
                @if ($socio->id == $pedido->pedidoable_id )
                    @if ($socio->direccion)

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-y-4" name="datosdireccionsocio">
                            <div>
                                <p class=" ml-auto font-bold mr-2">Comuna: </p>{{$socio->direccion->comuna}}
                            </div>
                            <div>
                                <p class="ml-auto font-bold mr-2">Calle: </p>{{$socio->direccion->calle}}
                            </div>
                            <div>
                                <p class="ml-auto font-bold mr-2">Nro: </p>{{$socio->direccion->numero}}
                            </div>
                            <div>
                                <p class="font-bold mr-2">{{$socio->direccion->region}}</p>
                            </div>
                            <div>
                                @switch($pedido->transportista->id)
                                      @case(1)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                      @case(2)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                        @case(3)
                                          <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{$pedido->transportista->name}}
                                          </span>
                                          @break
                                     
                                      @default
                                          
                                @endswitch
                                
                            </div>
                        </div>
                        
                        <div class="mt-4  mb-20" name="productos">

                            @livewire('vendedor.pedidos-ordens', ['pedido' => $pedido], key('pedidos-ordens.'.$pedido->id))
                            
                        </div>
                        
                        
                    @else
                    
                        <div name="formulariodireccionsocios">

                            <h1 class="text-xl font-bold text-red-500 text-center mb-6"> Debes ingresar una dirección de despacho antes de agregar los productos al pedido</h1>
            

                            
                            {!! Form::open(['route' => 'vendedor.pedidos.store']) !!}
                    
                            {!! Form::hidden('user_id',auth()->user()->id) !!}
                    
                            {!! Form::hidden('pedidoable_type','App\Models\Invitado') !!}
                    
                            @include('vendedor.pedidos.partials.formdirection')
                    
                    
                            <div class="flex justify-end">
                                <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                                {!! Form::submit('Agregar Dirección', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                            </div>
                    
                            {!! Form::close() !!}
                    
                        </div>



                    @endif
                @endif
            @endforeach
        @endif
        
</div>
  
</div>
    

   

    
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>

</div>
