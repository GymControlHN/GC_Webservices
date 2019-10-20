<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index () {
        $estudiantes = Estudiante::paginate(10);
        return view('estudiantes')->with('estudiantes' , $estudiantes);
    }

    public function create() {
        return view('estudiantes');
    }

    public function store(Request $request) {

        $this -> validate ( $request ,[
             'nombre'=>'required',
             'edad'=>'required',
             'numero_de_cuenta'=>'required',
             'fecha_de_ingreso'=>'required',
             'carrera'=>'required',
             'telefono'=>'required',
         ]);

        $Nuevoestudiante = new Estudiante();

        $Nuevoestudiante->nombre = $request->input('nombre');
        $Nuevoestudiante->edad = $request->input('edad');
        $Nuevoestudiante->numero_de_cuenta = $request->input('numero_de_cuenta');
        $Nuevoestudiante->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $Nuevoestudiante->carrera = $request->input('carrera');
        $Nuevoestudiante->telefono = $request->input('telefono');

        $Nuevoestudiante->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return redirect('estudiantes');

    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes')->with('estudiantes', $estudiante);

    }

    public function update(Request $request, $id)
    {

         //Validar los datos
        $this -> validate ( $request ,[
            'nombre'=>'required',
            'edad'=>'required',
            'numero_de_cuenta'=>'numeric|digits:11|',
            'fecha_de_ingreso'=>'required',
            'carrera'=>'required',
            'telefono'=>'required|min:8',
        ]);

        // Buscar la instancia en la base de datos.
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        // Asignar los nuevos valores a los diferentes campos
        $estudiante->nombre = $request->input('nombre');
        $estudiante->edad = $request->input('edad');
        $estudiante->numero_de_cuenta = $request->input('numero_de_cuenta');
        $estudiante->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $estudiante->telefono = $request->input('telefono');

        // Guardar los cambios
        $estudiante->save();

        // Redirigir a la lista de todos los estudiantes.
        return redirect('estudiantes')->with('estudiantes', $estudiante);

    }

        //$estudiante = Estudiante::findOrFail($id);
        //$estudiante->update($request->all());
//return back();


    public function destroy($id) {
        Estudiante::destroy($id);

        return redirect('estudiantes');


    }




}
