<?php

namespace App\Http\Livewire\Socio;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class StravaActivity extends Component
{   public $activityData;

    public function render()
    {
        return view('livewire.socio.strava-activity');
    }

    public function loadActivityData()
    {
        // Realizar una solicitud a la API de Strava y obtener los datos de actividad
        $response = Http::withHeaders([
            'Authorization' => '933d1a1f2a0428c5a49ce45f55bd8df827987fe4',
        ])->get('https://www.strava.com/api/v3/activities/1894408067');

        $this->activityData = $response->json();
    }

}
