<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function index($id)
    {

        $cliente = Cliente::findOrFail($id);
        return view('graficos')->with("cliente",$cliente);
    }

    //
}
