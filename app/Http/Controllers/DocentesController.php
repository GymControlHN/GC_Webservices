<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class DocentesController extends Controller
{
    public function index()
    {
        $clientes =Cliente::where("tipo","=","Docente")
            ->paginate(10);
        return view('docentes')->with('docentes', $clientes);
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
          'telefono'=>'required',
          'genero'=>'required',
             'fecha_de_ingreso'=>'required',


         ]);


        $nuevoDocente = new Cliente();
        $nuevoDocente->nombre = $request->input('nombre');
        $nuevoDocente->numero_de_empleado = $request->input('numero_de_empleado');
        $nuevoDocente->edad = $request->input('edad');
        $nuevoDocente->telefono = $request->input('telefono');
        $nuevoDocente->genero = $request->input('genero');
        $nuevoDocente->fecha_de_ingreso = $request->input('fecha_de_ingreso');




        $nuevoDocente->tipo="Docente";


        $nuevoDocente->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');

        return redirect('docentes');
    }



    public function edit($id)
    {
        $clientes = Cliente::findOrFail($id);
        return view('docentes')->with('docente', $clientes);

    }

    public function update(Request $request)
    {

        // Validar los datos

       /* $this -> validate ( $request ,[
            'nombre'=>'required',
            'edad'=>'required',
            'numero_de_empleado'=>'required',
            'fecha_de_ingreso'=>'required',
            'telefono'=>'required',
        ]);
*/

        // Buscar la instancia en la base de datos.


        // Asignar los nuevos valores a los diferentes campos
        $docente = Cliente::findOrfail($request->input("docente_id"));
        $docente->nombre = $request->input('nombre');
        $docente->edad = $request->input('edad');
        $docente->numero_de_empleado = $request->input('numero_de_empleado');
        $docente->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $docente->telefono = $request->input('telefono');
        $docente->genero = $request->input('genero');
        $docente->tipo="Docente";

        $docente->save();


       $docente = Cliente::paginate(10);
       return back();


    }

    public function destroy($id)
    {
        Cliente::destroy($id);


        return redirect('docentes');
    }

    public function buscarDocente(Request $request)
    {
        $busquedaDoc = $request->input("busquedaDoc");

        $docentes = Cliente:: where("nombre", "like", "%" . $busquedaDoc . "%")
            ->orWhere("fecha_de_ingreso", "like", "%" . $busquedaDoc . "%")
            ->paginate(10);

        return view('docentes')->with('docentes', $docentes);
    }


}
