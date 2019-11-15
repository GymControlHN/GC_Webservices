<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class  EstudiantesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where("id_tipo_cliente","=","1")
            ->paginate(10);
        return view('estudiantes')->with('estudiantes', $clientes);
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

        $nuevoEstudiante = new Cliente();

        $nuevoEstudiante->nombre = $request->input('nombre');
        $nuevoEstudiante->edad = $request->input('edad');
        $nuevoEstudiante->numero_de_cuenta = $request->input('numero_de_cuenta');
        $nuevoEstudiante->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoEstudiante->carrera = $request->input('carrera');
        $nuevoEstudiante->telefono = $request->input('telefono');
        $nuevoEstudiante->tipo="Estudiante";
        $nuevoEstudiante->genero = $request->input("genero");

        $nuevoEstudiante->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');

        return back()->with(["exito"=>"Se agregó exitosamente"]);

    }

    public function show(Cliente $estudiantes)
    {

    }

    public function edit($id)
    {
        $estudiante = Cliente::findOrFail($id);
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
        $estudiantes = Cliente::findOrfail($request->input("estudiante_id"));
        $estudiantes->nombre=$request->input("nombre");
        $estudiantes->edad = $request->input("edad");
        $estudiantes->numero_de_cuenta =$request->input("numero_de_cuenta");
        $estudiantes->carrera = $request->input("carrera");
        $estudiantes->telefono = $request->input("telefono");
        $estudiantes->fecha_de_ingreso = $request->input("fecha_de_ingreso");
        $estudiantes->tipo="Estudiante";
        $estudiantes->genero = $request->input("genero");

        $estudiantes->save();

        $estudiantes1 = Cliente::paginate(10);
        return back();


    }

    public function destroy($id)
    {
        Cliente::destroy($id);

        return back()->with(["exito"=>"Se elimino exitosamente"]);


    }

    public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $clientes = Cliente:: where("tipo","=","Estudiante")
        ->where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $clientes);
    }



    /*public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }*/





}
