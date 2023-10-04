<x-vendedor-layout>
    <x-slot name="tl">
            
        <title>Pedido Nro: {{$pedido->id}}</title>
        
        
    </x-slot>

    <x-slot name="pedido">
        {{$pedido->id}}
    </x-slot>
    
    <x-fast-view-vendedor :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">

        
        <div class="mb-20">
                   
                    <div class="grid grid-cols-2">
                        <div>
                            <h1 class="text-xl font-bold col-span-3">Orden de Pedido Nro: {{$pedido->id}}</h1>
                        </div>
                    @if ($pedido->status==1 || $pedido->status==2)
                    
                        <div class="ml-auto">
                            <form action="{{route('vendedor.pedidos.destroy',$pedido)}}" method="POST">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger btn-sm" type="submit"> Eliminar</button>
                            </form>
                        </div>
                    @endif
                    </div>
                    <hr class="mt-2 mb-6">

                    <div class="max-w-7xl px-4 sm:px-6 lg:px-2 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-x-2 gap-y-2 ">
                        

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
                                        <p class="ml-auto mr-4"><b>Rut:  </b>{{$invitado->rut}}</p>
                                        @if ($invitado->fono)
                                            <p class="ml-auto mr-4"><b>Fono:  </b>{{$invitado->fono}}</p>
                                        @endif
                                            

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
                                            <a href="{{route('socio.show', $socio)}}"><p class="mr-4 font-bold">Nombre:</p>{{$socio->user->name}}</a>
                                            <span class="ml-2 px-2 inline-flex text-xs leading-5 items-center font-semibold rounded-full bg-green-100 text-green-800">
                                                Socio
                                            </span>
                                        </div>
                                        <div>
                                        <p class="mr-4"><b>Rut: </b>{{$socio->rut}}</p>
                                        @if ($socio->fono)
                                            <p class="mr-4"><b>Fono: </b>{{$socio->fono}}</p>
                                        @endif
                                            

                                        </div>
                                    </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                    </div>
            
                    @if ($pedido->pedidoable_type == "App\Models\Invitado")
                        @foreach ($invitados as $invitado)
                            @if ($invitado->id == $pedido->pedidoable_id )
                                @if ($invitado->direccion)

                                <div>
                                    <header class="border border-gray-200 px-4 pt-2 cursor bg-gray-200 mt-6 rounded-t-lg flex justify-between">
                                        <h1 class="font-bold text-lg text-gray-800">Dirección</h1>
                                        <form action="{{route('vendedor.direccions.destroy',$invitado->direccion)}}" method="POST">
                                            @csrf
                                            @method('delete')
            
                                            <button class="" type="submit"> <i class="fas fa-trash cursor-pointer text-red-500 ml-auto align-middle"  alt="Eliminar"></i></button>
                                        
                                        </form>
                                    
                                    </header>
                                    <div class="full-w px-4 sm:px-2 lg:px-6 py-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-0 shadow-lg rounded-b-lg">
                                        
            
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
            
                                        </div>    
                                    </div>
                                </div>
                                    
                                    <div class="mt-4" name="productos">
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

                                    <div>
                                        <header class="border border-gray-200 px-4 pt-2 cursor bg-gray-200 mt-6 rounded-t-lg flex justify-between">
                                            <h1 class="font-bold text-lg text-gray-800">Dirección</h1>
                                            <form action="{{route('vendedor.direccions.destroy',$socio->direccion)}}" method="POST">
                                                @csrf
                                                @method('delete')
                
                                                <button class="" type="submit"> <i class="fas fa-trash cursor-pointer text-red-500 ml-auto align-middle"  alt="Eliminar"></i></button>
                                            
                                            </form>
                                        
                                        </header>
                                        <div class="full-w px-4 sm:px-2 lg:px-6 py-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-0 shadow-lg rounded-b-lg">
                                            
                
                                            <div>
                                                <p class="font-bold mr-2s">Comuna: </p>{{$socio->direccion->comuna}}
                                            </div>
                                            <div>
                                                <p class="font-bold mr-2s">Calle: </p>{{$socio->direccion->calle}}
                                            </div>
                                            <div>
                                                <p class="font-bold mr-2s">Nro: </p>{{$socio->direccion->numero}}
                                            </div>
                                            <div>
                                                <p class="font-bold mr-2">{{$socio->direccion->region}}</p>
                                            </div>
                
                                            <div>
                
                                            </div>    
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4" name="productos">

                                        @livewire('vendedor.pedidos-ordens', ['pedido' => $pedido], key('pedidos-ordens.'.$pedido->id))
                                        
                                    </div>
                                    
                                    
                                @else
                                
                                    <div name="formulariodireccionsocios">

                                        <h1 class="text-xl font-bold text-red-500 text-center mb-6"> Debes ingresar una direccion de despacho antes de agregar los productos al pedido</h1>
                        

                                        
                                        {!! Form::open(['route' => 'vendedor.direccions.store']) !!}

                                        {!! Form::hidden('pedido_id', $pedido->id ) !!}
                                
                                        {!! Form::hidden('direccionable_id', $pedido->pedidoable_id ) !!}

                                        {!! Form::hidden('direccionable_type','App\Models\Socio') !!}
                                        
                                        @include('vendedor.pedidos.partials.formdirection')
                                
                                
                                        <div class="flex justify-end">
                                          
                                            {!! Form::submit('Agregar Dirección', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                                        </div>
                                
                                        {!! Form::close() !!}
                                
                                    </div>



                                @endif
                            @endif
                        @endforeach
                    @endif

                    

                

                <x-slot name="js">
                    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
                    <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
                </x-slot>
        </div>
    </x-fast-view>
</x-vendedor-layout> 