<div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="flex justify-center">
            @if ($evento->type=='pista')
                <p class="text-base leading-none my-auto mx-auto">En qué Cilindrada vas entrenar?</p>
            @else
                <p class="text-base leading-none my-auto mx-auto">En que categoria deseas competir?</p>
            @endif
        </div>    
    <div class="grid grid-cols-1 justify-center">
        @if (IS_NULL($categoria_id))
            @foreach ($fecha->categorias as $item)
            {{-- comment 
                <form action="{{route('ticket.inscripcions.store')}}" method="POST">
                    @csrf
                    

                    <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                    <input name="categoria_id" type="hidden" value="{{$item->categoria->id}}">

                    <input name="fecha_categoria_id" type="hidden" value="{{$item->id}}">
                    <input name="nro" type="hidden" value="{{$nro}}">

                    <input name="cantidad" type="hidden" value="{{$item->inscripcion}}">
                    <input name="fecha_id" type="hidden" value="{{$fecha->id}}">

                    <button class="btn btn-danger text-white mx-2 text-md my-2">
                        {{$item->categoria->name}}-${{number_format($item->inscripcion)}}
                    </button>
                </form>
            --}}
                <button wire:click="set_categoria({{$item->id}})" class="btn btn-danger text-white mx-2 text-md my-2">
                    {{$item->categoria->name}} ${{number_format($item->inscripcion)}}
                </button>
                
            @endforeach
        @else
            <button wire:click="categoria_clean" class="btn btn-danger text-white mx-2 text-md my-4">
                {{$fechacategoria->categoria->name}} ${{number_format($fechacategoria->inscripcion)}}
            </button>
        @endif
      
 
</div>
        @if ($evento->type=='carrera' || $evento->type=='campeonato')
            
            <div class="flex justify-center hidden">      
                <select wire:model="selectedcategoria" class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @if ($evento->type=='pista')
                        <option value="">--Cilindrada--</option>
                    @else
                        <option value="">--Categoria--</option>
                    @endif
                    @foreach ($fecha->categorias as $item)

                        <option value="{{$item->id}}">{{$item->categoria->name}} ${{number_format($item->inscripcion)}}</option>
                        
                    @endforeach
                </select>
            </div>
            
        @endif
    </div>

        @foreach ($ticket->evento->fechas as $fecha)
            @if ($fecha->fecha>=now()->subDays(1))
                <div class="flex items-center justify-between pb-5 px-8 bg-blue-900 text-white py-2 my-4">
                    
                    @if ($fecha->name=='keyname')
                        <label class="mx-4"> Entrenamiento {{date('d/m/Y', strtotime($fecha->fecha))}}
                        </label>
                    @else
                        <p class="text-base leading-none dark:text-white"> {{$fecha->name}}</p>
                    @endif
                                    
            
                    
                    
                    @if ($categoria_id)  
                        @if($ticket->evento->type=='pista')
                            <div class="">
                                <p class="text-base leading-none mx-auto text-center">Categoria:  </p>
                                <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center">{{$fechacategoria->categoria->name}}</h1>
                            </div>
                        @endif
                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                        </div>
                        <div class="block">
                            @if ($evento->type=='pista')
                                
                                    <p class="ml-4">Cuantas Motos? </p>
                                    <input wire:model="nro" type="number" class="w-24 border-2 border-gray-300 bg-white h-10 px-5 text-gray-900 ml-4 rounded-lg">
                                    
                                    <div class="text-white  text-md font-bold px-4" wire:loading wire:target="nro">
                                        <img class="h-5" src="{{asset('img/cargando.gif')}}" alt="">
                                    </div>

                                
                            @elseif($evento->type=='desafio')
                                    
                            @else
                            
                                    <p class="">Número de Moto: </p>
                                    <input wire:model="nro" type="number" class="w-24 border-2 border-gray-300 bg-white h-10 px-5 text-gray-900 rounded-lg">
                                    
                                    <div class="text-white  text-md font-bold px-4" wire:loading wire:target="nro">
                                        <img class="h-5" src="{{asset('img/cargando.gif')}}" alt="">
                                    </div>

                            
                            @endif

                   
                     

                    </div>
                    
                    <form action="{{route('ticket.inscripcions.store')}}" method="POST">
                        @csrf
                        

                        <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                        <input name="categoria_id" type="hidden" value="{{$categoria_id}}">
                        <input name="fecha_categoria_id" type="hidden" value="{{$fechacategoria->id}}">
                        <input name="nro" type="hidden" value="{{$nro}}">
                        <input name="cantidad" type="hidden" value="{{$fechacategoria->inscripcion}}">
                        <input name="fecha_id" type="hidden" value="{{$fecha->id}}">

                        <button class="btn btn-primary mt-2 ml-4" type="submit">Agregar</button>
                    </form>   
                    
                        <p wire:click="add({{$fecha}})" class="hidden btn btn-primary">Agregar</p>



                    @else
                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                        </div>
                        @if ($evento->type=='pista')
                            <p class="bg-white text-gray-900 py-2 px-4 rounded-lg">Ingrese una cilindrada</p>
                        @else
                            <p class="bg-white text-gray-900 py-2 px-4 rounded-lg">Ingrese una categoria</p>
                        @endif
                    @endif        
                </div>
            @endif
        @endforeach

            {{-- PREFICHA --}}

</div>
