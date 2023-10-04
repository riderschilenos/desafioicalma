<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nonbre">
        </div>

        @if ($socios->count())
            
      
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th style="text-align: center;">Foto</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fono</th>
                        <th>Estado</th>
                        <th>Suscripción</th>
                        <th></th>

                    </thead>
                    
                    <tbody>
                        @foreach ($socios->reverse() as $socio)
                            <tr>
                                <td>{{$socio->id}}</td>
                                <td style="text-align: center;">
                                
                                        <img class="object-cover object-center" width="60px" src="{{ $socio->user->profile_photo_url }}" alt="">
                                    
    
                                </td>
                                <td>{{$socio->name}}</td>
                                <td>{{$socio->user->email}}</td>
                                <td>
                                    @if ($socio->fono)
                                    <a href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola%20que%20tal" target="_blank">
                                        {{str_replace(' ', '', $socio->fono)}}
                                    </a> 

                                    @endif</td>
                                <td>
                                    @if($socio->status==1)
                                    ACTIVO
                                    @else
                                     INACTIVO
                                    @endif
                                
                                </td>
                                <td width="120px">
                                    @if($socio->status==2)
                                    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.suscripcion.sociocreate',$socio)}}">Suscripción</a>
                                    @else
                                        @if ($socio->suscripcions->count())
                                            {{$socio->suscripcions->first()->end_date}}

                                            
                                        @else
                                        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.suscripcion.sociocreate',$socio)}}">Suscripción</a> 
                                        
                                        @endif
                                    
                                    @endif
                                </td>
                                @if($socio->status==2)
                                    <td width="10px">
                                        <a class="btn btn-secondary" href="{{route('socio.show', $socio)}}">Ver Perfil</a>
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-secondary" href="{{route('admin.socios.show', $socio)}}">Ver Ficha</a>
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-secondary" href="{{route('socio.entrenamiento',$socio)}}">Entrenamientos</a>
                                    </td>
                                
                                @else
                                    <td width="10px">
                                        <a class="btn btn-success" href="{{route('socio.show', $socio)}}">Ver Perfil</a>
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-success" href="{{route('admin.socios.show', $socio)}}">Ver Ficha</a>
                                    </td>
                                    <td width="10px">
                                        <a class="btn btn-success" href="{{route('socio.entrenamiento',$socio)}}">Entrenamientos</a>
                                    </td>
                                
                                @endif
                               
                            </tr>
                            
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$socios->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros que coincidan</strong>
            </div>
       

        @endif
    </div>
</div>
