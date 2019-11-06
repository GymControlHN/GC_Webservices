<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
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
