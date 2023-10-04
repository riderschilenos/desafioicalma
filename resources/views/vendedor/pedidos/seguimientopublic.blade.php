<x-app-layout>
    <x-slot name="tl">
            
        <title>Seguimiento Pedido N°{{$pedido->id}} </title>
        
        
    </x-slot>

    <x-slot name="pedido">
        {{$pedido->id}}
    </x-slot>

    <style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>
    <div class="container pt-8 pb-20 mb-20" >

        @livewire('vendedor.pedido-seguimiento', ['pedido' => $pedido], key('pedido-seguimiento.'.$pedido->id))

    </div>

</x-app-layout> 