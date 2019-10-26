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
        return view('estudiantes')->with('estudiante', $estudiante);

    }

    public function update(Request $request)
    {
        

        // Buscar la instancia en la base de datos.
        /* //Validar los datos
               $this->validate($request, [
                    'nombre' => 'required',
                    'edad' => 'required',
                   'numero_de_cuenta' => 'max:13',
                    'carrera' => 'required',
                    'telefono' => 'required|min:8',
                   'fecha_de_ingreso' => 'requirer',
                ]);
        */
        // Buscar la instancia en la base de datos.
        $estudiantes = Estudiante::findOrfail($request->input("estudiante_id"));
        $estudiantes->nombre=$request->input("nombre");
        $estudiantes->edad = $request->input("edad");
        $estudiantes->numero_de_cuenta =$request->input("numero_de_cuenta");
        $estudiantes->carrera = $request->input("carrera");
        $estudiantes->telefono = $request->input("telefono");
        $estudiantes->fecha_de_ingreso = $request->input("fecha_de_ingreso");
        $estudiantes->save();

        $estudiantes1 = Estudiante::paginate(10);
        return back();


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
