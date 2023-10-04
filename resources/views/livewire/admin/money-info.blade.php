<div>
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


                if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3 || $orden->producto->id==7  || $orden->producto->id==21){
                $carcasas+=1;   }
                elseif($orden->producto->id==4){
                    $llaveros+=1; 
                }
                elseif($orden->producto->id==10){
                    $collares+=1; 
                }
                elseif($orden->producto->id==8){
                    $colgantes+=1; 
                }
                elseif($orden->producto->id==5 || $orden->producto->id==6){
                    $poleras+=1; 
                }
                elseif($orden->producto->id==13  || $orden->producto->id==14  || $orden->producto->id==19 || $orden->producto->id==21){
                    
                    $polerones+=1; 
                }
                elseif($orden->producto->id==9){
                    $stickers+=1; 
                }


            @endphp    
            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            @php


                if($orden->producto->id==1 || $orden->producto->id==2 || $orden->producto->id==3|| $orden->producto->id==7  || $orden->producto->id==21){
                $carcasas+=1;   }
                elseif($orden->producto->id==4){
                    $llaveros+=1; 
                }
                elseif($orden->producto->id==10){
                    $collares+=1; 
                }
                elseif($orden->producto->id==8){
                    $colgantes+=1; 
                }
                elseif($orden->producto->id==5 || $orden->producto->id==6){
                    $poleras+=1; 
                }
                elseif($orden->producto->id==13  || $orden->producto->id==14 || $orden->producto->id==11 || $orden->producto->id==12  || $orden->producto->id==19 || $orden->producto->id==21){
                    $polerones+=1; 
                }
                elseif($orden->producto->id==9){
                    $stickers+=1; 
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
    @php
        $meses_letter=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agostro','Septiembre','Octubre','Noviembre','Diciembre'];
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
        
        $ventas_anual=[];
            foreach ($meses as $mes) {
                $totalmespago=0;
                foreach ($pagos_anual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmespago+=$pago->cantidad;
                    }
                        
                    
                }
                foreach ($suscripcions_anual as $suscripcion) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmespago+=$suscripcion->precio;
                    }
                        
                    
                }
            $ventas_anual[]=$totalmespago;
            }

        $gast_anual=[];
        foreach ($meses as $mes) {
                $totalmes=0;
                foreach ($gastos_anual as $pago) {
                    
                    if($pago->created_at->format('n')==$mes){
                        $totalmes+=$pago->cantidad;
                    }
                        
                    
                }
            $gast_anual[]=$totalmes;
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
        $ventas22=0;
                    foreach ($pagos_22anual as $pago) {
                            $ventas22+=$pago->cantidad;
                    }
                    foreach ($suscripcions_22anual as $suscripcion) {
                            $ventas22+=$suscripcion->precio;
                    }
                    
        $ventas23=0;
                    foreach ($pagos_23anual as $pago) {
                        $ventas23+=$pago->cantidad;
                    }
                    foreach ($suscripcions_23anual as $suscripcion) {
                            $ventas23+=$suscripcion->precio;
                    }

        foreach ($dias as $day) {
            $totaldiapago=0;
            foreach ($pagos30 as $pago) {
                if (intval($pago->created_at->format('d')) == $day) {
                    $totaldiapago+=$pago->cantidad;
                }
            }
            foreach ($suscripcions30 as $suscripcion){
                if (intval($suscripcion->created_at->format('d')) == $day) {
                    $totaldiapago+=$suscripcion->precio;
                }
                

            }
       
            $ventas[]=$totaldiapago;
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
        
    @endphp
     @php
        $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    @endphp
    <div class="mb-6">
        <a href="{{route('contabilidad')}}">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-4">
                <div>
                    
                </div>
                <div class="flex justify-center">
                    <div class="mt-[14px] w-full mx-2 cursor-pointer bg-white  rounded-full border border-green-700 px-3 text-[#191D23]">
                        <h1 class="text-center text-sm">Hoy</h1>
                        <h1 class="mx-1">${{number_format($totaldiapago)}}</h1>
                    </div>
                    <div class="mt-[14px] w-full mx-2 cursor-pointer bg-white  rounded-full border border-[#E7EAEE] px-3 text-[#191D23]">
                        <h1 class="text-center text-sm">{{$meses[date('m', strtotime($now))-1]}}</h1>
                        <h1 class="mx-1">${{number_format($totalmespago)}}</h1>
                    </div>
                    <div class="mt-[14px] w-full mx-2 cursor-pointer bg-white  rounded-full border border-[#E7EAEE] px-3 text-[#191D23]">
                        <h1 class="text-center text-sm">2023</h1>
                        <h1 class="mx-1">${{number_format($ventas23)}}</h1>
                    </div>
                </div>
                <div class="mt-[14px] ml-auto mr-2 cursor-pointer bg-white truncate rounded-full border border-[#E7EAEE] px-3 text-[#191D23]">
                    <h1 class="text-center text-sm">2022</h1>${{number_format($ventas22)}}
                </div>
            </div>
        </a>
    </div>
</div>
