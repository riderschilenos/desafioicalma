<div>
@php
    $total=0;
    $pendientes=1000;
    $retiroacumulado=0;
    
@endphp

    @foreach ($tickets as $ticket)
            @if($ticket->status>=3)
                @php
                    $total+=$ticket->inscripcion;
                @endphp
            @endif   
        
           
    @endforeach

    @foreach ($retiros as $retiro)
        @php
            $retiroacumulado+=$retiro->cantidad;
        @endphp
    @endforeach
    
    <div class="justify-between mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
            <img class="" src="https://i.imgur.com/dJeEVcO.png" alt="" />
            <div class="text-center">
              <h1 class="text-4xl font-bold text-gray-800">${{number_format($total)}}</h1>
              <span class="text-gray-500">Venta 
               
            </div>
        </div>

        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
            <img class="" src="https://i.imgur.com/Qnmqkil.png" alt="" />
            <div class="text-center">
              <h1 class="text-4xl font-bold text-gray-800">${{number_format($total*0.069)}}</h1>
              <span class="text-gray-500">Comision<br>(6.9%)</span>
            </div>
        </div>

        
        @if ($total-$total*0.069-$retiroacumulado==0)
            <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                <img class="ml-6" src="https://i.imgur.com/dJeEVcO.png" alt="" />
                <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800">${{number_format($retiroacumulado)}}</h1>
                <span class="text-gray-500">Total retirado</span>
                </div>
            </div>
        @else
            <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                <img class="ml-6" src="https://i.imgur.com/dJeEVcO.png" alt="" />
                <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800">${{number_format($total-$total*0.069-$retiroacumulado)}}</h1>
                <span class="text-gray-500">Pendiente de </span>
         
                <span class="text-blue-500 font-bold">RETIRAR</span>
                </div>
            </div>
        @endif

          

        
        <!-- 

        <div class="bg-white w-1/3 rounded-xl shadow-lg flex items-center justify-around">
            
            <div class="text-center">
                <span class="text-gray-500">BONO</span>
                <h1 class="text-4xl font-bold text-gray-800">$500.000</h1>
                <span class="text-gray-500">En ventas</span>
            </div>
            <div class="text-center">
                <img src="https://static.vecteezy.com/system/resources/previews/001/609/741/non_2x/padlock-security-symbol-isolated-cartoon-free-vector.jpg" class="h-20" alt="" />
                <span class="text-gray-500">MAS INFO</span>
            </div>       
        </div>
        -->
        
      </div>
      {!! Form::open(['route'=>'organizador.retiros.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
      @csrf
      @if ($total-$total*0.069-$retiroacumulado>0)
          <div class="h-32 mt-6">
              <h1 class="text-xl text-center"><b>Nombre:</b> {{$evento->user->vendedor->name}}</h1>
              <h1 class="text-xl text-center"><b>Rut:</b> {{$evento->user->vendedor->rut}}</h1>
              <h1 class="text-xl text-center"><b>Banco:</b> {{$evento->user->vendedor->banco}}</h1>
              <h1 class="text-xl text-center"><b>Cuenta:</b> {{$evento->user->vendedor->tipo_cuenta}}</h1>
              <h1 class="text-xl text-center"><b>Nro Cuenta:</b> {{$evento->user->vendedor->nro_cuenta}}</h1>

              <h1 class="text-xl font-bold text-center py-2 mt-4">Monto: ${{number_format($total-$total*0.069-$retiroacumulado)}}</h1>
              <hr class="w-full mb-4">
              
              {{-- comment{!! Form::file('comprobante', ['class'=>'form-input w-full mt-6'.($errors->has('comprobante')?' border-red-600':''), 'id'=>'comprobante','accept'=>'image/*']) !!}
              @error('foto')
                  <strong class="text-xs text-red-600">{{$message}}</strong>
              @enderror
--}}
              
          </div>

          {!! Form::hidden('user_id', Auth()->user()->id ) !!}

          {!! Form::hidden('metodo', 'TRANSFERENCIA' ) !!}

          {!! Form::hidden('evento_id', $evento->id ) !!}


          {!! Form::hidden('cantidad', $total-$total*0.069-$retiroacumulado ) !!}

         

          {!! Form::hidden('estado', '1' ) !!}

          
        
            <div class="flex justify-center mt-16">
                {!! Form::submit('Retirar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
            </div>
          @endif
         
      
      {!! Form::close() !!}

      <x-table-responsive>


        @if ($retiros->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nro:
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Importe
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                  
                   
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($retiros->reverse() as $retiro)
                        
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 text-center">
                                        {{$retiro->id}}
                                    
                                    </div>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                    
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{$retiro->user->profile_photo_url}}" alt="">
                                            
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$retiro->user->name}}<br>
                                                {{$retiro->user->email}}<br>
                                                {{$retiro->user->socio->fono}}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </td>

                                
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 text-center">
                                        <a href="" class="text-gray-900 font-bold hover:text-indigo-900">${{number_format($retiro->cantidad)}}</a>
                                    </div>
                                    
                                </td>

                                
                                

                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            
                                    {{date('d M Y g:i a', strtotime($retiro->created_at))}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 text-center">
                                       
                                          
                                                @if ($retiro->estadp==2)
                                                    <a href="" class="btn btn-success h-10 my-auto">PAGAGO</a>
                                                @else
                                                    <a href="" class="btn btn-danger h-10 my-auto">PENDIENTE</a>
                                                @endif
                                               
                                               
                                        
                                         
                                        
                                    
                                    </div>
                                    
                                </td>

                            </tr>

                    @endforeach
                <!-- More people... -->
                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No hay ningun registro
            </div>
        @endif 


    </x-table-responsive>

    <x-table-responsive>
        <div class="px-6 py-4">
            <input wire:model="search" class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Buscar Rider...">
        </div>

        @if ($tickets->count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ticket Nro:
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Rut
                    </th>
                   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Importe
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total
                    </th>
                  
                   
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($tickets as $ticket)
                        
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 text-center">
                                       
                                                    <a href="" class="btn btn-success h-10 my-auto">{{$ticket->id}}</a>
                                                  
                                        
                                    
                                    </div>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                    
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{$ticket->user->profile_photo_url}}" alt="">
                                            
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$ticket->user->name}}<br>
                                                {{$ticket->user->email}}<br>
                                                {{$ticket->user->socio->fono}}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text">{{$ticket->user->socio->rut}}</div>
                                    
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 text-center">
                                                    @php
                                                        $tot=0;
                                                    @endphp
                                                    
                                                    @foreach ($ticket->inscripcions as $inscripcion)
                                                                    
                                                                          <div class="flex">
                                                                             
                                                                                    <div class="px-6 py-4 whitespace-nowrap">
                                                                                
                                                                                    {{-- comment   {{$fecha->name}} --}} {{$inscripcion->fecha_categoria->categoria->name}}
                                                                                    
                                                                                    </div>
                                                                        
                                                                            
                                                
                                                                                    <div class="px-6 py-4 whitespace-nowrap">
                                                                                        <div class="items-center">
                                                                                            <p class="mx-4 text-center">${{number_format($inscripcion->fecha_categoria->inscripcion)}}</p>
                                                                                            @php
                                                                                                $tot+=$inscripcion->fecha_categoria->inscripcion;
                                                                                            @endphp
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                            </div> 
                                                                                
                                            
                                
    
                                                    @endforeach
                                            
                                        
                                    
                                    </div>
                                    
                                </td>

                                
                                

                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="" class="text-gray-900 font-bold hover:text-indigo-900">${{number_format($ticket->inscripcion)}}</a>
                                  
                                </td>
                            </tr>

                    @endforeach
                <!-- More people... -->
                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No hay ningun registro
            </div>
        @endif 

    </x-table-responsive>


</div>