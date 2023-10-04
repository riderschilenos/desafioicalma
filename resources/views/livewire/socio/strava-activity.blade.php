<div>
    <h2>Detalles de la Actividad</h2>

    @if ($activityData)
        <p><strong>Distancia:</strong> {{ $activityData['distance'] }} metros</p>
        <p><strong>Duración:</strong> {{ gmdate("H:i:s", $activityData['moving_time']) }}</p>
        <!-- Otros detalles de la actividad -->
    @else
        <p>No se ha cargado ninguna actividad.</p>
    @endif

    <button wire:click="loadActivityData">Cargar Actividad</button>
</div>
