<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gasto;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Suscripcion;
use App\Models\Vendedor;
use Livewire\Component;

class MoneyInfo extends Component
{   
    public function render()
    {   $pedidos=Pedido::where('status',4)
        ->orwhere('status',5)
        ->orwhere('status',6) 
        ->orwhere('status',7)
        ->orwhere('status',8)
        ->orwhere('status',9)
        ->orderby('status','DESC')
        ->get();


        
        $suscripcion28=Suscripcion::all()->where('created_at', '>=', now()->subDays(28));
        $suscripcions=Suscripcion::all();
        $suscripcions7=Suscripcion::all()->where('created_at', '>=', now()->subDays(7));
        $suscripcions30=Suscripcion::all()->where('created_at', '>=', now()->subDays(29));
        $suscripcions_anual=Suscripcion::all()->where('created_at', '>=', now()->subDays(330));
        $suscripcions_22anual=Suscripcion::whereYear('created_at', '=', 2022)->get();
        $suscripcions_23anual=Suscripcion::whereYear('created_at', '=', 2023)->get();


        $gastos=Gasto::all();
        $gastos7=Gasto::all()->where('created_at', '>=', now()->subDays(7));
        $gastos30=Gasto::all()->where('created_at', '>=', now()->subDays(29));
        $gastos_anual=Gasto::all()->where('created_at', '>=', now()->subDays(330));

        
        $pagos=Pago::all();
        $pagos7=Pago::all()->where('created_at', '>=', now()->subDays(7));
        $pagos30=Pago::all()->where('created_at', '>=', now()->subDays(29));
        $pagos_anual=Pago::all()->where('created_at', '>=', now()->subDays(330));
        $pagos_22anual=Pago::whereYear('created_at', '=', 2022)->get();
        $pagos_23anual=Pago::whereYear('created_at', '=', 2023)->get();
        $vendedors=Vendedor::all();

        $now=now();

        

        return view('livewire.admin.money-info',compact('suscripcions_23anual','suscripcions_22anual','suscripcions_anual','suscripcions30','suscripcions7','pagos_23anual','pagos_22anual','pagos_anual','gastos_anual','suscripcion28','now','pedidos','suscripcions','gastos','pagos','gastos7','pagos7','gastos30','pagos30','vendedors'));
    
    
    }
}
