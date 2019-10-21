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
        return view('estudiantes')->with('estudiante', $estudiante);

    }

    public function update(Request $request)
    {

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

    public function destroy($id) {
        Estudiante::destroy($id);

        return redirect('estudiantes');


    }




}
