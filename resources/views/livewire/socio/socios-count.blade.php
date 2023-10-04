<div class="flex justify-center">
    @php

    $bicicletas=0;
    $motos=0;

        foreach ($sociosfull as $socio) {
            
           
                if ($socio->disciplina_id==2 or $socio->disciplina_id==4 or $socio->disciplina_id==5 or $socio->disciplina_id==8 ) {
                    $bicicletas+=1;}
                else {
                    $motos+=1;
                
                }    
            
            
        }


    @endphp
     <div class="hidden sm:block">
        <div class="flex justify-end mr-4 ">

            
            <div class="grid grid-cols-3 gap-3">
                    <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas+$motos}}<br> TOTAL</button>
                    <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTO</button>
                    <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas}}<br> BICICLETA</button>
                   
            </div>
            

        </div>
    </div>
    <div class="block sm:hidden">
        <div class="flex justify-center ">

            
                
                <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center mr-2">{{$bicicletas+$motos}}<br> TOTAL</button>
         
                <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTO</button>
           
          
                <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ml-2">{{$bicicletas}}<br> BICICLETA</button>
                
            

        </div>
    </div>
</div>
