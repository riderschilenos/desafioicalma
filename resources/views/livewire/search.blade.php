<div class="z-1">


                <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm"
                type="search" name="search" placeholder="Buscar" style="z-index: 10;">


                @if ($search)
                    <ul class="absolute z-1 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden px-4">
                        @forelse ($this->riders as $rider)
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                <a href="{{route('socio.show',$rider)}}">{{$rider->name}}</a>
                            </li>
                            @empty
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                No se encontraron riders...
                            </li>
                                
                        
                        @endforelse
                        @forelse ($this->series as $serie)
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                <a href="{{route('series.show',$serie)}}">{{$serie->titulo}}</a>
                            </li>
                            @empty
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                No se encontraron series...
                            </li>
                                
                            
                        @endforelse
                        @forelse ($this->eventos as $evento)
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                <a href="{{route('ticket.evento.show',$evento)}}">{{$evento->titulo}}</a>
                            </li>
                            @empty
                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                No se encontraron eventos...
                            </li>
                                
                            
                        @endforelse
                    
                        
                    </ul>
            
                    
                @else
                    
                @endif
                

</div>
