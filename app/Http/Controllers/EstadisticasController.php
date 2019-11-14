<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class EstadisticasController extends Controller
{
    public function index()
    {
        $estudiantes = Cliente::where("tipo","=","Estudiante")
            ->paginate(10);

        $docentes = Cliente::where("tipo","=","Docente")
            ->paginate(10);


        $particulares = Cliente::where("tipo","=","Particular")
            ->paginate(10);


        return view('estadisticas')->with('estudiantes', $estudiantes)->with("docentes",$docentes)
            ->with("particulares",$particulares);
    }
    public function create() {

        return view('estadisticas');
    }

}
