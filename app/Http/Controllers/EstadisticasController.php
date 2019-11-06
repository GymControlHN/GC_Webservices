<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class EstadisticasController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where("tipo","=","Estudiante")
            ->orwhere("tipo", "=", "Docente")
            ->paginate(10);

        return view('estadisticas')->with('estadisticas', $clientes);
    }
    public function create() {

        return view('estadisticas');
    }

}
