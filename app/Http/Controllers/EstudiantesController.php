<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;

class  EstudiantesController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::paginate(10);
        return view('estudiantes')->with('estudiantes', $estudiantes);
    }

    public function create()
    {
        return view('estudiantes');
    }

    public function store(Request $request)
    {
        //$validatedData = $request->validate([
        //  'nombre'=>'required',
        // 'edad'=>'required|numeric|max:100|min:10',
        // 'numero_de_cuenta'=>'required|numeric|max:11',
        //  'fecha_de_ingreso'=>'required|max:12',
        //  'carrera'=>'required',
        // 'telefono'=>'required|numeric|max:8',
        //]);

        $nuevoEstudiante = new Estudiante();

        $nuevoEstudiante->nombre = $request->input('nombre');
        $nuevoEstudiante->edad = $request->input('edad');
        $nuevoEstudiante->numero_de_cuenta = $request->input('numero_de_cuenta');
        $nuevoEstudiante->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoEstudiante->carrera = $request->input('carrera');
        $nuevoEstudiante->telefono = $request->input('telefono');

        $nuevoEstudiante->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return redirect('estudiantes');

    }

    public function show(Estudiante $estudiantes)
    {

    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes')->with('estudiantes', $estudiante);

    }

    public function update(Request $request, $id)
    {

        // Validar los datos

        $validatedData = $request->validate([
            'nombre' => 'required',
            'edad' => 'required|numeric|max:100|min:10',
            'numero_de_cuenta' => 'required|unique',
            'fecha_de_ingreso' => 'required|max:12',
            'carrera' => 'required',
            'telefono' => 'required|numeric|max:8',

        ]);

        // Buscar la instancia en la base de datos.
        $estudiante = Estudiante::findOrFail($id);

        //Asignar los nuevos valores a los diferentes campos

        $estudiante->nombre = $request->input('nombre');
        $estudiante->edad = $request->input('edad');
        $estudiante->numero_de_cuenta = $request->input('numero_de_cuenta');
        $estudiante->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $estudiante->carrera = $request->input('carrera');
        $estudiante->telefono = $request->input('telefono');

        // Guardar los cambios
        $estudiante->save();

        // Redirigir a la lista de todos los estudiantes.
        return redirect('estudiantes');


    }

    public function destroy($id)
    {
        Estudiante::destroy($id);

        return redirect('estudiantes');


    }

    public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }



    /*public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }*/





}
