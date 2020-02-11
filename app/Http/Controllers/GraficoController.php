<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Cliente;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function index($id)
    {

        $clienteChart= new UserChart();
        $clienteChart->labels(["Ene","Feb","Mar"]);

        $clienteChart->dataset('clientes', 'line', [10, 25, 13])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");

        $cliente = Cliente::findOrFail($id);
        return view('graficos',["chart"=>$clienteChart])->with("cliente",$cliente);
    }

    //
}
