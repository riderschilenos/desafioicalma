<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    public function index() 
    {
        return view('admin.socios.index');
    }

    public function show(Socio $socio) 
    {   

        return view('admin.socios.show',compact('socio'));
    }
}
