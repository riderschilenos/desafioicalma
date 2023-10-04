<div>


  
  <div class="flex justify-center">
    
    <div class="max-w-4xl"> 
      <h1 class="text-center font-bold text-2xl text-white my-4 md:my-12">Historial {{$user->name}}</h1>
      @if ($tickets->count())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-4 gap-y-2 mx-2 md:mx-4"> 
           
                @foreach ($tickets->reverse() as $ticket)
                        @if ($ticket->status==1)
                          @can('enrolled', $ticket->evento)
                              <div class="bg-white shadow-lg rounded-xl p-4">
                  
                                    <div class="flex items-center justify-center  my-1">
                                        
                                        <div>
                                          @if ($ticket->evento->type=='desafio')
                                            <h2 class="text-sm text-center">{{$ticket->evento->titulo}}</h2>

                                          @else
                                            <h2 class="text-sm text-center">Entrada {{$ticket->evento->titulo}}</h2>
                                          @endif
                                        
                                          <h2 class="text-sm pb-2 text-center">{{$ticket->created_at->format('d/m/Y')}}</h2>
                                         
                                        </div>
                                    </div>
                                  
                                                  <div class="flex justify-center mx-auto mb-5">
                                                    <a href="{{route('ticket.view',$ticket)}}">
                                                      <img class="object-center" width="150px" src="{{Storage::url($ticket->qr)}}" class="p-1">
                                                    </a>
                                                  </div>
                                                

                                              @switch($ticket->status)
                                                    @case(1)
                                                            <div class="font-semibold text-center">
                                                                <a href="" class="btn bg-gray-200 h-4 my-auto">
                                                                ACTIVO
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
                                                                COBRADO
                                                              </a>
                                                            </div>
                                                        @break
                                                      @case(5)
                                                            <div class="font-semibold text-center">
                                                              <a href="" class="btn btn-danger h-4 my-auto">
                                                                COBRADO
                                                              </a>
                                                            </div>
                                                        @break
                                                    
                                                @default
                                                    
                                              @endswitch  
                              </div>
                          @endcan
                        @else
                          <div class="bg-white shadow-lg rounded-xl p-4">
                    
                            <div class="flex items-center justify-center  my-1">
                                        
                              <div>
                                @if ($ticket->evento->type=='desafio')
                                <h2 class="text-sm text-center">{{$ticket->evento->titulo}}</h2>

                              @else
                                <h2 class="text-sm text-center">Entrada {{$ticket->evento->titulo}}</h2>
                              @endif
                                <h2 class="text-sm pb-2 text-center">{{$ticket->created_at->format('d/m/Y')}}</h2>
                               
                              </div>
                          </div>
                          
                                          <div class="flex justify-center mx-auto mb-5">
                                            <a href="{{route('ticket.view',$ticket)}}">
                                              <img class="object-center" width="150px" src="{{Storage::url($ticket->qr)}}" class="p-1">
                                            </a>
                                          </div>
                                        

                                      @switch($ticket->status)
                                            @case(1)
                                                    <div class="font-semibold text-center">
                                                        <a href="" class="btn bg-gray-200 h-4 my-auto">
                                                        ACTIVO
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
                                                        COBRADO
                                                      </a>
                                                    </div>
                                                @break
                                              @case(5)
                                                    <div class="font-semibold text-center">
                                                      <a href="" class="btn btn-danger h-4 my-auto">
                                                        COBRADO
                                                      </a>
                                                    </div>
                                                @break
                                            
                                        @default
                                            
                                      @endswitch  
                          </div>
                        @endif
                         
                            
              @endforeach
           
        </div>
      @else
              
        <div id="button" class="hidden container mx-auto flex justify-center items-center px-4 md:px-10 py-20">
          <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
          <button onclick="openModal()" class="bg-white text-gray-800 py-5 px-10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white rounded">Open Modal</button>
        </div>
        <div id="modal" class="container mx-auto flex justify-center items-center px-4 md:px-10 py-20 my-12 ">
          <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
          <div class="bg-white dark:bg-gray-800 px-3 md:px-4 py-12 flex flex-col justify-center items-center">
           
            <h1 class="mt-8 md:mt-12 text-3xl lg:text-4xl font-semibold leading-10 text-center text-gray-800 text-center md:w-9/12 lg:w-7/12 dark:text-white">Historial de Tickets!</h1>
            <p class="mt-10 text-base leading-normal text-center text-gray-600 md:w-9/12 lg:w-7/12 dark:text-white">Cuando hayas comprado entradas a pistas podras ver tu historial de compra en esta página</p>
            
          </div>
        </div>
        
          
        @endif
      </div>
  </div>
</div>