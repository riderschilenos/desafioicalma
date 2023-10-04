<?php

namespace App\Http\Livewire\Socio;

use App\Models\Socio;
use Livewire\Component;

class SociosCount extends Component
{
    public function render()
    {    $sociosfull = Socio::all();
        return view('livewire.socio.socios-count',compact('sociosfull'));
    }
}
