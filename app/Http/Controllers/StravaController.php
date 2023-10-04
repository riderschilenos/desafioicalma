<?php

namespace App\Http\Controllers;

use App\Models\AtletaStrava;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StravaController extends Controller
{
    public function handleAuthorization(Request $request)
    {
        $code = $request->query('code');

        // Intercambio de código por token de acceso usando Guzzle
        $client = new Client();
        $response = $client->post('https://www.strava.com/oauth/token', [
            'form_params' => [
                'client_id' => env('ST_CLIENT_ID'),
                'client_secret' => env('ST_CLIENT_SECRET'),
                'code' => $code,
                'grant_type' => 'authorization_code',
            ],
        ]);

        $data = json_decode($response->getBody(), true);


        $atletaId = $data['athlete']['id'];
        $athleteName = $data['athlete']['username'];
        
        AtletaStrava::create([
            'user_id' => auth()->user()->id, // Reemplaza con el ID del atleta
            'atleta_id' => $atletaId, // Reemplaza con el ID del atleta
            'access_token' => $data['access_token'],
            'refresh_token' => $data['refresh_token'], // Si aplica
            'token_expires_at' => now()->addSeconds($data['expires_in']), // Calcula la fecha de vencimiento
            'scope' => $code,
            'athlete_name' => $athleteName, // Reemplaza con el nombre del atleta
        ]);

        // Aquí puedes guardar el token de acceso en la base de datos u otra acción
        // $data['access_token'] contiene el token de acceso que puedes utilizar para acceder a la API de Strava

        return redirect()->route('home');
    }
}
