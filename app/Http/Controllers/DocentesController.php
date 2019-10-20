<?php

namespace App\Http\Controllers;

use App\Docente;


use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function index()
    {
        $docentes = Docente::paginate(10);
        return view('docentes')->with('docentes', $docentes);
    }

    public function create()
    {
        return view('docentes');
    }

    public function store(Request $request){

      $this -> validate ( $request ,[
             'nombre'=>'required',
             'edad'=>'required',
             'numero_de_empleado'=>'required',
             'fecha_de_ingreso'=>'required',
             'telefono'=>'required',
         ]);

        $nuevoDocente = new Docente();

        $nuevoDocente->nombre = $request->input('nombre');
        $nuevoDocente->edad = $request->input('edad');
        $nuevoDocente->numero_de_empleado = $request->input('numero_de_empleado');
        $nuevoDocente->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoDocente->telefono = $request->input('telefono');

        $nuevoDocente->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return redirect('docentes');


    }
    public function show(Docente $docentes)
    {
        //
    }
    public function edit($id)
    {
        $docentes = Docente::findOrFail($id);
        return view('docentes')->with('docentes', $docentes);

    }

    public function update(Request $request, $id)
    {

        // Validar los datos
        $this -> validate ( $request ,[
            'nombre'=>'required',
            'edad'=>'required',
            'numero_de_empleado'=>'required',
            'fecha_de_ingreso'=>'required',
            'telefono'=>'required',
        ]);

        // Buscar la instancia en la base de datos.
        $docente = Docente::findOrFail($id);

        // Asignar los nuevos valores a los diferentes campos
        $docente->nombre = $request->input('nombre');
        $docente->edad = $request->input('edad');
        $docente->numero_de_empleado = $request->input('numero_de_empleado');
        $docente->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $docente->telefono = $request->input('telefono');

        // Guardar los cambios
        $docente->save();

        // Redirigir a la lista de todos los estudiantes.
        return redirect('docentes');


    }

    public function destroy($id)
    {
       Docente::destroy($id);


        return redirect('docentes');
    }




}
