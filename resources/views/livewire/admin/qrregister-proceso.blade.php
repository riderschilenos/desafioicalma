<div>
    @switch($qrregister->proceso)
                                        
        @case(1)
            
            <a class="btn btn-light btn-sm" href="">BORRADOR</a>
            <a class="btn btn-secondary btn-sm" href="" wire:click="procesomas({{$qrregister}})">+</a>
            @break
        @case(2)
            <a class="btn btn-secondary btn-sm" href="" wire:click="procesomenos({{$qrregister}})">-</a>
            <a class="btn btn-info btn-sm" href="">DISEÑADO</a>
            <a class="btn btn-secondary btn-sm" href="" wire:click="procesomas({{$qrregister}})">+</a>
        @break
        @case(3)
            <a class="btn btn-secondary btn-sm" href="" wire:click="procesomenos({{$qrregister}})">-</a>
            <a class="btn btn-warning btn-sm" href="">En drive</a>
            <a class="btn btn-secondary btn-sm" href="" wire:click="procesomas({{$qrregister}})">+</a>
        @break
        @case(4)
            <a class="btn btn-secondary btn-sm" href="" wire:click="procesomenos({{$qrregister}})">-</a>
            <a class="btn btn-primary btn-sm" href="">IMPRESO</a>
            <a class="btn btn-secondary btn-sm" href="" wire:click="procesomas({{$qrregister}})">+</a>
            @break
        @case(5)
        <a class="btn btn-secondary btn-sm" href="" wire:click="procesomenos({{$qrregister}})">-</a>
        <a class="btn btn-danger btn-sm" href="">VENDIDO</a>
        <a class="btn btn-secondary btn-sm" href="" wire:click="procesomas({{$qrregister}})">+</a>
          @break
        @case(6)
        <a class="btn btn-secondary btn-sm" href="" wire:click="procesomenos({{$qrregister}})">-</a>
        <a class="btn btn-success btn-sm" href="">ACTIVADO</a>
        
          @break
                                          
      @default
                                          
    @endswitch
</div>
