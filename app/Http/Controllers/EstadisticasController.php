<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class EstadisticasController extends Controller
{
    public function index()
    {
        $clientes = Cliente::join("tipo_clientes",
            "clientes_gym.id_tipo_cliente", "=", "tipo_clientes.id")
            ->select("clientes_gym.*", "tipo_clientes.descripcion")
            ->paginate(10);


        return view('estadisticas')->with('clientes', $clientes);
    }

    public function create()
    {

        return view('estadisticas');
    }

}
