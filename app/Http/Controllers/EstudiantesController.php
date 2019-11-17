<?php

namespace App\Http\Controllers;

use App\Carrera;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cliente;

class  EstudiantesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where("id_tipo_cliente","=","1")
            ->join("carreras","clientes_gym.id_carrera","=","carreras.id")
            ->select("clientes_gym.*","carreras.carrera")
            ->paginate(10);

        $carrera = Carrera::all();
        return view('estudiantes')->with('estudiantes', $clientes)->with("carreras",$carrera);
    }

    public function create($id)
    {
        $now = Carbon::now();
        return view('estudiantes')->with("id", $id)->with("now", $now);
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
        $nuevoEstudiante->identificacion = $request->input('identificacion');
        $nuevoEstudiante->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoEstudiante->id_carrera = $request->input('carrera');
        $nuevoEstudiante->telefono = $request->input('telefono');
        $nuevoEstudiante->id_tipo_cliente="1";
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
        $estudiantes->identificacion =$request->input("identificacion");
        $estudiantes->id_carrera = $request->input("carrera");
        $estudiantes->telefono = $request->input("telefono");
        $estudiantes->fecha_de_ingreso = $request->input("fecha_de_ingreso");
        $estudiantes->id_tipo_cliente="1";
        $estudiantes->genero = $request->input("genero");

        $estudiantes->save();

        $estudiantes1 = Cliente::paginate(10);
        return back();


    }

    public function destroy(Request $request)
    {
        Cliente::destroy($request->input("id"));

        return back()->with(["exito"=>"Se elimino exitosamente"]);


    }

    public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $clientes = Cliente:: where("id_tipo_cliente","=","1")
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
