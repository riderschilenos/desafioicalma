<div x-data="setup()">
    @php
    $total=0;
    $total7=0;
    $total30=0;
    
    $gast7=0;
    $gast30=0;

    $comisiones=0;

    $comisionespagadas=0;

    $totalsuscrip=0; //ingresos por suscripcion

    $carcasas=0;
    $llaveros=0;
    $collares=0;
    $colgantes=0;
    $poleras=0;
    $polerones=0;
    $stickers=0;


    //gastos

    $comisionventas=0;
    $comisiondiseño=0;
    $comisionproduccion=0;

    $pendienteventas=0;
    $pendientediseño=0;
    $pendienteproduccion=0;

    $compracarcasas=0;
    $gastosgenerales=0;
    @endphp

    @foreach ($pedidos as $pedido)
        
        @if($pedido->pedidoable_type=="App\Models\Socio")
            @foreach ($pedido->ordens as $orden)
            @php


        if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3|| $orden->producto->id==7  || $orden->producto->id==21 || $orden->producto->id==35 || $orden->producto->id==36 || $orden->producto->id==38 || $orden->producto->id==39 || $orden->producto->id==40 || $orden->producto->id==41 || $orden->producto->id==42){
                if($orden->producto->id==35 ||$orden->producto->id==39){
                    $carcasas+=2;   
                }else{
                    $carcasas+=1;   
                }
               }
               elseif($orden->producto->id==4  || $orden->producto->id==34|| $orden->producto->id==36 || $orden->producto->id==15 || $orden->producto->id==38 || $orden->producto->id==40|| $orden->producto->id==45 || $orden->producto->id==46){
                    if($orden->producto->id==34){
                        $llaveros+=3;  
                    }elseif($orden->producto->id==45 || $orden->producto->id==46){
                        $llaveros+=2;  
                    }else{
                        $llaveros+=1;   
                    }
           
                }
                elseif($orden->producto->id==10|| $orden->producto->id==36 || $orden->producto->id==15 || $orden->producto->id==42){
                    $collares+=1; 
                }
                elseif($orden->producto->id==8 || $orden->producto->id==36 || $orden->producto->id==15 || $orden->producto->id==41){
                    $colgantes+=1; 
                }
                elseif($orden->producto->id==5 || $orden->producto->id==6){
                    $poleras+=1; 
                }
                elseif($orden->producto->id==13  || $orden->producto->id==14  || $orden->producto->id==19 || $orden->producto->id==21){
                    
                    $polerones+=1; 
                }
                elseif($orden->producto->id==9 || $orden->producto->id==44){
                    if($orden->producto->id==9){
                        $stickers+=2;   
                    }else{
                        $stickers+=1;   
                    }
                   
                }


            @endphp    
            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            @php


                if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3|| $orden->producto->id==7  || $orden->producto->id==21 || $orden->producto->id==35 || $orden->producto->id==36 || $orden->producto->id==38 || $orden->producto->id==39 || $orden->producto->id==40 || $orden->producto->id==41 || $orden->producto->id==42){
                if($orden->producto->id==35 ||$orden->producto->id==39){
                    $carcasas+=2;   
                }else{
                    $carcasas+=1;   
                }

                }
                elseif($orden->producto->id==4  || $orden->producto->id==34|| $orden->producto->id==36 || $orden->producto->id==15 || $orden->producto->id==38 || $orden->producto->id==40|| $orden->producto->id==45 || $orden->producto->id==46){
                    if($orden->producto->id==34){
                        $llaveros+=3;  
                    }elseif($orden->producto->id==45 || $orden->producto->id==46){
                        $llaveros+=2;  
                    }else{
                        $llaveros+=1;   
                    }
           
                }
                elseif($orden->producto->id==10|| $orden->producto->id==36 || $orden->producto->id==15 || $orden->producto->id==42){
                    $collares+=1; 
                }
                elseif($orden->producto->id==8 || $orden->producto->id==36 || $orden->producto->id==15 || $orden->producto->id==41){
                    $colgantes+=1; 
                }
                elseif($orden->producto->id==5 || $orden->producto->id==6){
                    $poleras+=1; 
                }
                elseif($orden->producto->id==13  || $orden->producto->id==14 || $orden->producto->id==11 || $orden->producto->id==12  || $orden->producto->id==19 || $orden->producto->id==21){
                    $polerones+=1; 
                }
                elseif($orden->producto->id==9 || $orden->producto->id==44){
                    if($orden->producto->id==9){
                        $stickers+=2;   
                    }else{
                        $stickers+=1;   
                    }
                   
                }
                

            @endphp    
            @endforeach

        @endif

        @if($pedido->pedidoable_type=="App\Models\Socio")
            @foreach ($pedido->ordens as $orden)
             

            @if($pedido->status==9)
                @php
                    $comisionespagadas+=$orden->producto->comision_socio;
                @endphp   

            @else
                @php
                    $comisiones+=$orden->producto->comision_socio;
                @endphp   
            @endif

            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            
            @if($pedido->status==8)
                @php  
                    $comisionespagadas+=$orden->producto->comision_invitado;
                @endphp     

            @else
                @php  
                    $comisiones+=$orden->producto->comision_invitado;
                @endphp  
            @endif  
            @endforeach

        @endif

    @endforeach

    @foreach ($suscripcions as $suscripcion)
        @php
            $totalsuscrip+=$suscripcion->precio;
        @endphp
    @endforeach

    @foreach ($pagos as $pago)
        @php
               $total+=$pago->cantidad;
        @endphp
    @endforeach
    @foreach ($pagos7 as $pago)
        @php
               $total7+=$pago->cantidad;
        @endphp
    @endforeach
    @foreach ($pagos30 as $pago)
        @php
               $total30+=$pago->cantidad;
        @endphp
    @endforeach

    @foreach ($gastos7 as $gasto)
        @php
           
                $gast7+=$gasto->cantidad;   
                
        @endphp
    @endforeach
    @foreach ($gastos30 as $gasto)
        @php
           
                $gast30+=$gasto->cantidad;   
                
        @endphp
    @endforeach

    @foreach ($gastos as $gasto)
        @php
                if($gasto->gastotype_id==1){
                    $comisionventas+=$gasto->cantidad;   
                    if($gasto->estado==1){
                        $pendienteventas+=$gasto->cantidad;
                    }
                }
                elseif($gasto->gastotype_id==2){
                    $comisiondiseño+=$gasto->cantidad;
                    if($gasto->estado==1){
                        $pendientediseño+=$gasto->cantidad;
                    }
                }
                elseif($gasto->gastotype_id==3){
                    $comisionproduccion+=$gasto->cantidad;
                    if($gasto->estado==1){
                        $pendienteproduccion+=$gasto->cantidad;
                    }
                }
                elseif($gasto->gastotype_id==4){
                    $compracarcasas+=$gasto->cantidad;
                }
                elseif($gasto->gastotype_id>4){
                    $gastosgenerales+=$gasto->cantidad;
                }
        
        @endphp
    @endforeach

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <ul class="flex justify-center items-center my-4">
        <template x-for="(tab, index) in tabs" :key="index">
            <li class="cursor-pointer py-3 px-4 rounded transition"
                :class="activeTab===index ? 'bg-red-500 text-white' : ' text-gray-500'" @click="activeTab = index"
                x-text="tab"></li>
        </template>
    
    </ul>
  
    <div x-show="activeTab===0">
                            
        <figure class="highcharts-figure" class="mt-4 bg-white shadow">
            <div id="grafico"></div>
        </figure>
    
        <figure class="highcharts-figure" class="mt-4 bg-white shadow">
            <div id="container" class="mt-4"></div>
        </figure>
    
        <figure class="highcharts-figure" class="mt-4 bg-white shadow">
            <div id="balance" class="mt-4"></div>
        </figure>


    </div>
    <div x-show="activeTab===1">
        <div>
            <figure class="highcharts-figure mx-1 mt-4" wire:ignore>
               <div id="gastotreinta" wire:ignore>
                  
               </div>
            </figure>
         </div>
         <div>
            <figure class="highcharts-figure mx-1 mt-4" wire:ignore>
               <div id="gastouno" wire:ignore>
                  
               </div>
            </figure>
         </div>
         <div>
            <figure class="highcharts-figure mx-1 mt-4" wire:ignore>
               <div id="gastodos" wire:ignore>
                  
               </div>
            </figure>
         </div>

       Gastos Listado

    </div>
 
    
    

    

    @routeIs('admin.home')        
        <div class="container">
            <div class="card-header mb-4">
                <h1 class="text-center"><b>${{number_format($total+$totalsuscrip-($comisionventas+$comisiondiseño+$comisionproduccion+$compracarcasas+$gastosgenerales))}}</b></h1>

                <h3 class="block sm:hidden text-center">SEM: <b class="mr-4">${{number_format($total7-($gast7))}}</b> <br >MES: <b>${{number_format($total30-($gast30))}}</b></h3>
            
            </div>
            <div class="row justify-content-md-center">
                <div class="col">
                    <h2 class="text-center"><b>${{number_format($total+$totalsuscrip)}}</b></h2>
                    <h5 class="block sm:hidden text-center">SEM: <b class="mr-4">${{number_format($total7)}}</b> <br >MES: <b>${{number_format($total30)}}</b></h5>
                    <h5 class="text-center">INGRESOS</h5>
                    <div class="row justify-content-md-center">
                        <div class="mx-auto" min-width="80%">
                            <div class="card text-white bg-success mb-3" style="min-width: 16rem;">
                                <div class="card-header text-center"><b class="h1">${{number_format($total)}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title text-center">Ventas en Productos</h5>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="mx-auto" min-width="80%">
                            <div class="card text-white bg-success mb-3" style="min-width: 16rem;">
                                <div class="card-header text-center"><b class="h1">${{number_format($totalsuscrip)}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title text-center">Ventas en Suscripciones</h5>
                                
                            
                            </div>
                            </div>
                        </div>
                        {{-- comment
                        <div class="col">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header"><b class="h1">$253.000</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title">Ticketera RCH</h5><br>
                                
                            
                            </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col">
                    <h2 class="text-center"><b>${{number_format($comisionventas+$comisiondiseño+$comisionproduccion+$compracarcasas+$gastosgenerales)}}</b></h2>
                    <h5 class="block sm:hidden text-center">SEM: <b class="mr-4">${{number_format($gast7)}}</b> <br >MES: <b>${{number_format($gast30)}}</b></h5>
                    <h5 class="text-center">GASTOS</h5>
                    <div class="row justify-content-md-center">
                        <div class="col">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisionventas)}}</b></div>
                                @if ($pendienteventas>0)
                                    <div class="card-header"><b class="h5">- ${{number_format($pendienteventas)}} (Pendientes)</b></div>
                                @endif
                                
                            <div class="card-body">
                                
                                    <h5 class="card-title">Comisiones en ventas</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisiondiseño)}}</b></div>
                                @if ($pendientediseño>0)
                                    <div class="card-header"><b class="h5">- ${{number_format($pendientediseño)}} (Pendientes)</b></div>
                                @endif
                            <div class="card-body">
                                
                                    <h5 class="card-title">Comisiones en diseño</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-title px-2 pt-2"><b class="h1">${{number_format($comisionproduccion)}}</b></div>
                                @if ($pendienteproduccion>0)
                                    <div class="card-header"><b class="h5">- ${{number_format($pendienteproduccion)}} (Pendientes)</b></div>
                                @endif
                            <div class="card-body">
                                
                                    <h5 class="card-title">Comisiones en producción</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-title px-2 pt-2"><b class="h1">${{number_format($compracarcasas)}}</b></div>
                                <div class="card-header"><b class="h5"> {{-- comment- $.000 (EXTRAS)--}}</b></div> 
                            <div class="card-body">
                                
                                    <h5 class="card-title">Carcasas</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-title px-2 pt-2"><b class="h1">${{number_format($gastosgenerales)}}</b></div>
                            <div class="card-header"><b class="h5"> {{-- comment- $.000 (EXTRAS)--}}</b></div> 
                            <div class="card-body">
                                
                                <a href="{{route('admin.gastos.create')}}" class="text-white"><h5 class="card-title">Gastos generales</h5></a><br>
                                
                            
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="card-header mb-4">
                <h3 class="text-center"><b>Ventas por Producto</b></h3>
            </div>
            <div class="row justify-content-md-center">
                <div class="col">

                    <div class="row justify-content-md-center">
                        
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$carcasas}}</b></div>
                                <img src="" alt="">
                                <div class="card-body">
                                    
                                        <h5 class="card-title mx-auto">Carcasas</h5><br>
                                    
                                
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$polerones}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title mx-auto">Polerones</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$llaveros}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title mx-auto">Llaveros</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$collares}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title mx-auto">Collares</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$colgantes}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title mx-auto">Colgantes</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$poleras}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title mx-auto">Poleras</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                       
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$stickers}}</b></div>
                            <div class="card-body">
                                
                                    <h5 class="card-title mx-auto">Styckers</h5><br>
                                
                            
                            </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header text-center"><b class="h1">{{$vendedors->count()}}</b></div>
                            <div class="card-body">
                                
                                    <a href="{{route('admin.vendedors.index')}}" class="text-white"><h5 class="card-title mx-auto">Vendedores</h5></a><br>
                                
                            
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    @endif
    @routeIs('contabilidad')
    <div class="mt-4">
        <h3 class="text-center"><b>Ventas por Producto</b></h3>
    </div>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-12">
        <div class="mt-2 sm:mt-4 mb-4 w-full grid grid-cols-3 md:grid-cols-5 xl:grid-cols-5 gap-x-2 gap-y-2 items-center content-center">
     
  
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($carcasas)}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Carcasas</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Carcasas</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($polerones)}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Polerones</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Polerones</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($llaveros)}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Llaveros</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Llaveros</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($collares)}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Collares</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Collares</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($colgantes)}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Colgantes</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Colgantes</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($poleras)}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Poleras</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Poleras</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($stickers)}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Stickers</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Stickers</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 <div class="max-w-xl  bg-white shadow rounded-lg p-2 sm:p-6 xl:p-8 my-2">
                    <div class="flex items-center">
                       <div class="flex-shrink-0">
                          <span class="text-4xl sm:text-8xl leading-none font-bold text-gray-900">{{number_format($vendedors->count())}}</span>
                          <h3 class="sm:hidden text-base font-normal text-gray-500">Vendedores</h3>
                          <h3 class="hidden sm:block text-base font-normal text-gray-500">Vendedores</h3>
                       </div>
                       <div class="hidden sm:flex w-10 items-center justify-end flex-1 text-red-500 text-base font-bold cursor-pointer">
                          
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                       </div>
                    </div>
                 </div>
                 
              
        </div>

    </div>
    @endif


 



    @php
        $meses_letter=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agostro','Septiembre','Octubre','Noviembre','Diciembre','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agostro','Septiembre','Octubre','Noviembre','Diciembre'];
        $final_anual=$now->format('n')+12;
        $inicio_anual=$now->format('n')+1;

        $meses=[];
        $meses_serie=[];

        foreach (range($inicio_anual,($final_anual)) as $number) {
            
                if($number>12){
                $nro=($number- 12);
                }else{
                $nro=$number;
                }  
            $meses[]=$nro;
            $meses_serie[]=$meses_letter[$nro-1];
            }
        $mesesbi=[];
        $mesesbi_serie=[];

        foreach (range($inicio_anual,($final_anual+12)) as $number) {
            
                if($number>12){
                $nro=($number- 12);
                }else{
                $nro=$number;
                }  
            $mesesbi[]=$nro;
            $mesesbi_serie[]=$meses_letter[$nro-1];
            }
        
        $ventas_anual=[];
        $ventas_anteanual=[];
           
                    
       
             //  Calcular Ventas de los ultimos 2 años
            foreach ($meses as $mes) {
                $totalmes=0;
               
                foreach ($pagos_anteanual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmes+=$pago->cantidad;
                    }
                }
                foreach ($suscripcions_anteanual as $suscripcion) {
                    
                    if($suscripcion->created_at->format('n')==$mes){
                        $totalmes+=$suscripcion->precio;
                    }
                }

                $ventas_anteanual[]=$totalmes;
            }

             //  Calcular Ventas del ultimo año
            foreach ($meses as $mes) {
                $totalmes=0;
               //suma pagos
                foreach ($pagos_anual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmes+=$pago->cantidad;
                    }
                        
                    
                }
                //Suma Suscripciones
                foreach ($suscripcions_anual as $suscripcion) {
                    
                    if($suscripcion->created_at->format('n')==$mes){
                        $totalmes+=$suscripcion->precio;
                    }
                        
                    
                }
                $ventas_anteanual[]=$totalmes;
                $ventas_anual[]=$totalmes;
            }

        $gast_anual=[];
        $gast_anteanual=[];
        $seriegastos30=[];

        $gasto30_total=0;
        //calcular gastos ultimos 30 dias para grafico circular
        foreach($gastotypes as $gastotype){
            
            $gasto30_circular=0;
            $gasto30_cir=[];
                
                    //suma los gastos si corresponde al tipo de gasto que se esta sumando
                    foreach ($gastos30 as $pago) {
                        if ($pago->gastotype_id==$gastotype->id) {
                            $gasto30_circular+=$pago->cantidad;
                        }
             
                    }
                    //inserta el gasto si la suma es mayor a cero
                        if ($gasto30_circular>0) {
                            $gasto30_total+=$gasto30_circular;
                            $gasto30_cir[]=$gasto30_circular;
                            $seriegastos30[]=['name' =>$gastotype->name,
                                                    'y'=> $gasto30_circular];
                                }
        }

        //calcular gastos ultimos 2 años para grafico circular
        foreach($gastotypes as $gastotype){
                    $gastoanteanual_circular=0;
                    $gastoanteanual_cir=[];

                      //suma los gastos si corresponde al tipo de gasto que se esta sumando
                        foreach ($gastos_anteanual as $pago) {
                            
                            if($pago->gastotype_id==$gastotype->id){
                                $gastoanteanual_circular+=$pago->cantidad;
                            }

                        }

                        foreach ($gastos_anual as $pago) {
                                if($pago->gastotype_id==$gastotype->id){
                                    $gastoanteanual_circular+=$pago->cantidad;
                                }
                            
                        
                    }
                    if ($gastoanteanual_circular>0) {
                           
                        $seriegastosanteanual[]=['name' =>$gastotype->name,
                                                'y'=> $gastoanteanual_circular];  

                    }
                }

        foreach($gastotypes as $gastotype){
           
                    $gastoanual_circular=0;

                        foreach ($gastos_anual as $pago) {
                            
                            if($pago->gastotype_id==$gastotype->id){
                                $gastoanual_circular+=$pago->cantidad;
                            }
                        
                    }
                    if ($gastoanual_circular>0) {
                        $seriegastosanual[]=['name' =>$gastotype->name,
                                        'y'=> $gastoanual_circular];  
                    }else {
                        $seriegastosanual[]=['name' =>$gastotype->name,
                        'y'=> 0];  
                     }
        }

        foreach ($meses as $mes) {
                $totalmes=0;
                foreach ($gastos_anteanual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmes+=$pago->cantidad;
                    }
                        
                    
                }

            $gast_anteanual[]=$totalmes;
            }
        foreach ($meses as $mes) {
                $totalmes=0;
                foreach ($gastos_anual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmes+=$pago->cantidad;
                    }
                        
                    
                }
            $gast_anual[]=$totalmes;
            $gast_anteanual[]=$totalmes;
            }


        $final=$now->format('d')+date('t', strtotime($now."- 1 month"));
        $inicio=$now->format('d')+1;
        $dias=[];

        foreach (range($inicio,($final)) as $number) {
              
                if($number>date('t', strtotime($now."- 1 month"))){
                   $nro=($number- date('t', strtotime($now."- 1 month")));
                }else{
                   $nro=$number;
                }  
               $dias[]=$nro;
            }
        

        $ventas=[];
        foreach ($dias as $day) {
            $totaldia=0;
            foreach ($pagos30 as $pago) {
                if (intval($pago->created_at->format('d')) == $day) {
                    $totaldia+=$pago->cantidad;
                }
            }
            foreach ($suscripcions30 as $suscripcion){
                if (intval($suscripcion->created_at->format('d')) == $day) {
                    $totaldia+=$suscripcion->precio;
                }
            }
       
            $ventas[]=$totaldia;
            }

        $gastos=[];
        foreach ($dias as $day) {
            $totaldia=0;
            foreach ($gastos30 as $pago) {
                if (intval($pago->created_at->format('d')) == $day) {
                    $totaldia+=$pago->cantidad;
                }
            }
            $gastos[]=$totaldia;
            }



        //$ventas =[43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175];
       // $gastos =[24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434];
        
       $titulo30="Ultimos 30 Días $".number_format($gasto30_total);

    @endphp

    <script>
        function setup() {
        return {
        activeTab: 0,
        tabs: [
            "Ventas/Gastos",
            "Porcentaje Gastos"
        ]
        };
    };
    </script>
         <script>
            var total30 = <?php echo json_encode($titulo30) ?>;
            var seriegastos30 = <?php echo json_encode($seriegastos30) ?>;
            var seriegastosanual = <?php echo json_encode($seriegastosanual) ?>;
            var seriegastosanteanual = <?php echo json_encode($seriegastosanteanual) ?>;

            Highcharts.chart('gastotreinta', {
                chart: {
                   plotBackgroundColor: null,
                   plotBorderWidth: null,
                   plotShadow: false,
                   type: 'pie'
                },
                title: {
                   text: total30,
                   align: 'left'
                },
                tooltip: {
                   pointFormat: '<b><b>${point.y}</b>({point.percentage:.0f}%)<br/>',
                },
                accessibility: {
                   point: {
                         valueSuffix: '%'
                   }
                },
                plotOptions: {
                   pie: {
                         allowPointSelect: true,
                         cursor: 'pointer',
                         dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                         },
                         showInLegend: true
                   }
                },
                series: [{
                   name: 'Brands',
                   colorByPoint: true,
                   data: seriegastos30
                }]
             });
             
             Highcharts.chart('gastodos', {
                chart: {
                   plotBackgroundColor: null,
                   plotBorderWidth: null,
                   plotShadow: false,
                   type: 'pie'
                },
                title: {
                   text: 'Ultimos 2 años',
                   align: 'left'
                },
                tooltip: {
                   pointFormat: '<b><b>{point.y}</b>({point.percentage:.0f}%)<br/>',
                },
                accessibility: {
                   point: {
                         valueSuffix: '%'
                   }
                },
                plotOptions: {
                   pie: {
                         allowPointSelect: true,
                         cursor: 'pointer',
                         dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                         },
                         showInLegend: true
                   }
                },
                series: [{
                   name: 'Brands',
                   colorByPoint: true,
                   data: seriegastosanteanual
                }]
             });
             
             Highcharts.chart('gastouno', {
                chart: {
                   plotBackgroundColor: null,
                   plotBorderWidth: null,
                   plotShadow: false,
                   type: 'pie'
                },
                title: {
                   text: 'Ultimos 365 Días',
                   align: 'left'
                },
                tooltip: {
                   pointFormat: '<b><b>{point.y}</b>({point.percentage:.0f}%)<br/>',
                },
                accessibility: {
                   point: {
                         valueSuffix: '%'
                   }
                },
                plotOptions: {
                   pie: {
                         allowPointSelect: true,
                         cursor: 'pointer',
                         dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                         },
                         showInLegend: true
                   }
                },
                series: [{
                   name: 'Brands',
                   colorByPoint: true,
                   data: seriegastosanual
                }]
             });
             
            
        </script>

    <script>
        var ventas = <?php echo json_encode($ventas) ?>;
        var ventas_anual = <?php echo json_encode($ventas_anual) ?>;
        var ventas_anteanual = <?php echo json_encode($ventas_anteanual) ?>;
        var dias = <?php echo json_encode($dias) ?>;
        var meses = <?php echo json_encode($meses_serie) ?>;
        var mesesbi = <?php echo json_encode($mesesbi_serie) ?>;
        var gastos = <?php echo json_encode($gastos) ?>;
        var gastos_anual = <?php echo json_encode($gast_anual) ?>;
        var gastos_anteanual = <?php echo json_encode($gast_anteanual) ?>;
        var now = <?php echo intval($pago->created_at->format('d'))?>;

        Highcharts.chart('grafico', {
            chart: {
                    type: 'areaspline'
                },
            
            title: {
                        text: 'Venta - Gastos Ultimos 30 Días'},
                       
            yAxis: {
                title: {
                    text: 'Pesos Chilenos'
                }
                                },
            colors: ['#01c600','#cd2300'],
            xAxis: {
                    categories: dias
                    },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                
            },

            series: [{
                name: 'Ventas',
                data: ventas
            }, {
                name: 'Gastos',
                data: gastos
            } ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

            });
            Highcharts.chart('container', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Venta - Gastos Ultimos 12 Meses'
                },
                colors: ['#01c600','#cd2300'],
                xAxis: {
                    categories: meses
                    },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                  
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
                },
                yAxis: {
                    title: {
                        text: 'Pesos Chilenos'
                    }
                },
                plotOptions: {
                 
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Ventas',
                    data: ventas_anual
                }, {
                    name: 'Gastos',
                    data: gastos_anual
                }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
            });

            Highcharts.chart('balance', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Venta - Gastos Ultimos 24 Meses'
                },
                colors: ['#01c600','#cd2300'],
                xAxis: {
                    categories: mesesbi
                    },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                  
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
                },
                yAxis: {
                    title: {
                        text: 'Pesos Chilenos'
                    }
                },
                plotOptions: {
                 
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Ventas',
                    data: ventas_anteanual
                }, {
                    name: 'Gastos',
                    data: gastos_anteanual
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
                        
    </script>
</div>
