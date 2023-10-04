<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class EventoView extends Component
{   use AuthorizesRequests;

    public $user, $current;

    public function mount(User $user){
        $this->user =$user;
    }

    public function render()
    {   $tickets=Ticket::where('user_id',$this->user->id)->get();
        
        return view('livewire.evento-view',compact('tickets'));
    }
}
