 
<x-app-layout > 


  <x-slot name="tl">
            
    <title>Ticket Nro: {{$ticket->id}}</title>
</x-slot>

<x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
   

  <div class="flex justify-center w-full bg-blue-900">

    <div class="rounded-lg mt-12 mb-28">
    
        <div class="z-10 bg-blue-900 rounded-lg pb-20">
          <div class="flex mb-24">
            <div class="bg-white w-full rounded-lg px-6 py-5 mx-4">
  
              
                <div class="w-full mx-12">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center justify-between  my-1">
                      <span class="mr-3 rounded-full bg-white">
  
                      <img src="{{asset('img/ticket.png')}}" class="w-10 p-1">
                      
                      </span>
                      @if ($evento->type=='desafio')
                        <h2 class="text-xl mx-4">{{$evento->titulo}}</h2>

                        @else
                        <h2 class="text-xl mx-4">Entrada {{$evento->titulo}}</h2>
                        @endif
                      </div>
                     
                    </div>
                    <div class="border-b border-dashed border-b-2 my-5"></div>
                    <div class="flex items-center">
                     
                      <div class="flex flex-col mx-auto">
                        @if ($evento->type=='desafio')
                              <div class="bg-gray-100 p-4 rounded-lg shadow-lg text-center">
                                
                                <div class="text-4xl font-bold my-4" id="kilometers">1.58 Kms</div>
                                <div class="text-2xl font-semibold mb-2">Recorridos con Strava</div>
                                <div id="clock" class="text-sm">Quedan {{ $hoursRemaining }} horas y {{ $minutesRemaining }} minutos</div>
                                
                            </div>
                        @else
                          <a href="{{route('ticket.historial.view',$ticket->user)}}">
                            <img src="{{Storage::url($ticket->qr)}}" width="150px" class=" p-1">
                          </a>
                        @endif
                       
                      </div>
                     
                    </div>
                    <div class="border-b border-dashed border-b-2 my-5 pt-5">
                      <div class="absolute rounded-full w-5 h-5 bg-gray-800 -mt-2 -left-2"></div>
                      @if ($evento->type=='pista')
                        <h1 class="text-xs text-center">Información de pista</h1>
                      @else
                        <h1 class="text-xs text-center">Información de carrera</h1>
                      @endif
                      
                    
                    </div>
                      @foreach ($ticket->inscripcions as $inscripcion)
                          <div class="bg-gray-100 shadow mt-5">
                            <div class="flex items-center p-5 text-sm">
                              <div class="flex flex-col">
                                @if ($evento->type=='pista')
                                    <span class="text-center">Cilindrada</span>
                                @else
                                    <span class="text-center">Categoria</span>
                                @endif
                                <div class="font-semibold">{{$inscripcion->fecha_categoria->categoria->name}}</div>
              
                              </div>
                              <div class="flex flex-col ml-auto">
                                @if ($evento->type=='pista')
                                    <span class="text-sm text-center">Fecha</span>
                                @else
                                    <span class="text-sm text-center">Fecha</span>
                                @endif
                              
                                <div class="font-semibold text-center">
                                  @if ($inscripcion->fecha->name=='keyname')
                                      <label class="mx-4"> {{date('d/m/Y', strtotime($inscripcion->fecha->fecha))}}</label>
                                  @else
                                      <label class="mx-4"> {{$inscripcion->fecha->name}}</label>
                                  @endif
                                </div>
              
                              </div>
                              <div class="flex flex-col ml-auto">
                              
                              @switch($inscripcion->estado)
                                    @case(1)
                                            <div class="font-semibold text-center">
                                                <a href="" class="btn bg-gray-200 h-4 my-auto">
                                                CERRADA
                                                </a>
                                            </div>
                                        @break
                                    @case(2)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn bg-gray-200 h-4 my-auto">
                                              SIN PAGAR
                                              </a>
                                            </div>
                                        @break
                                    @case(3)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn btn-success h-4 my-auto">
                                              VIGENTE
                                              </a>
                                            </div>
                                        @break
                                      @case(4)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn btn-danger h-4 my-auto">
                                                COBRADA
                                              </a>
                                            </div>
                                        @break
                                      @case(5)
                                            <div class="font-semibold text-center">
                                              <a href="" class="btn btn-danger h-4 my-auto">
                                                COBRADA
                                              </a>
                                            </div>
                                        @break
                                    
                                @default
                                    
                              @endswitch
                              
              
                              </div>
                            </div>
                            
                            @if (auth()->user())
                              @if (auth()->user()->id==$ticket->evento->user_id)
                                @if ($inscripcion->estado==2 || $inscripcion->estado==3)
                                    <div class="flex justify-center px-5 pb-6 text-sm">
                                      <div class="font-semibold text-center">
                                          {!! Form::open(['route'=>['ticket.inscripcions.update',$inscripcion], 'method'=> 'PUT' ]) !!}
                                              @csrf
                                          {!! Form::submit('COBRAR', ['class'=>'btn btn-danger my-auto cursor-pointer']) !!}
                                          {!! Form::close() !!}
                                      </div>
                                    </div>
                                    
                                @endif
                               

                              @endif
                                
                            @endif
                            

                          </div>
                      @endforeach
                    
                    <div class="border-b border-dashed border-b-2 my-5 pt-5">
                      <div class="absolute rounded-full w-5 h-5 bg-gray-800 -mt-2 -left-2"></div>
                      <h1 class="text-xs text-center">Información del Rider</h1>
                    
                    </div>
                    <div class="flex items-center px-5 pt-3 text-sm">
                      <div class="flex flex-col">
                        <span class="">Nombre</span>
                        <div class="font-semibold">{{$ticket->user->name}}</div>
      
                      </div>
                     
                     
                     
                      @if($ticket->user->socio->direccion)
                          <div class="flex flex-col ml-6">
                            <span class="">Localidad</span>
                            <div class="font-semibold">{{Str::limit($ticket->user->socio->direccion->comuna.', '.$ticket->user->socio->direccion->region,20)}}</div>
          
                          </div>
                      @endif
                    </div>
                    <div class="flex flex-col py-5  justify-center text-sm ">
                      <h6 class="font-bold text-center">TICKET DE INGRESO</h6>
      
           
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
      
        </div>
  
    </div>
  </div>
      @php

          $endTime = $ticket->updated_at->addHours(48);

      @endphp
      <script>
        const clockDisplay = document.getElementById('clock');
        
        function updateClock() {
          const endTime = new Date(<?php echo json_encode($endTime) ?>);
          const currentTime =  new Date(); // Reemplaza con tu fecha de finalización

            const timeRemaining = endTime.getTime() - currentTime.getTime();

            const seconds = Math.floor((timeRemaining / 1000) % 60);
            const minutes = Math.floor((timeRemaining / (1000 * 60)) % 60);
            const hours = Math.floor(timeRemaining / (1000 * 60 * 60));

            clockDisplay.innerText = `Quedan ${hours} horas, ${minutes} minutos y ${seconds} segundos`;
        }

        updateClock(); // Actualiza inicialmente

        setInterval(updateClock, 1000); // Actualiza cada segundo
    </script>

  </x-fast-view>

</x-app-layout > 
