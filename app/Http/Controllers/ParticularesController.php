<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ParticularesController extends Controller
{
    public function index () {
        $clientes = Cliente::where("tipo","=","Particular")
            ->paginate(10);
        return view('particulares')->with('particulares' , $clientes);
    }

    public function create() {
        return view('particulares');
    }

    public function store(Request $request) {
        $this -> validate ( $request ,[
            'nombre'=>'required',
            'edad'=>'required',
            'numero_de_identidad'=>'required',
            'fecha_de_ingreso'=>'required',
            'profesion_u_oficio'=>'required',
            'telefono'=>'required',
            'genero'=>'required',
        ]);

        $nuevoParticular = new Cliente();

        $nuevoParticular->nombre = $request->input('nombre');
        $nuevoParticular->edad = $request->input('edad');
        $nuevoParticular->numero_de_identidad = $request->input('numero_de_identidad');
        $nuevoParticular->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoParticular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $nuevoParticular->telefono = $request->input ('telefono');
        $nuevoParticular->genero = $request->input ('genero');
        $nuevoParticular->tipo="Particular";
        $nuevoParticular->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return redirect('particulares');
    }


    public function edit($id) {
        $clientes = Cliente::findOrFail($id);
        return view('particulares')->with('particulares',$clientes);

    }

    public function update(Request $request) {

        // Validar los datos
       /* $this -> validate ( $request ,[
            'nombre'=>'required',
            'edad'=>'required',
            'numero_de_identidad'=>'required',
            'fecha_de_ingreso'=>'required',
            'profesion_u_oficio'=>'required',
            'telefono'=>'required',
        ]); */

        // Asignar los nuevos valores a los diferentes campos
        $particular = Cliente::findOrFail($request->input("particular_id"));
        $particular->nombre = $request->input('nombre');
        $particular->edad = $request->input('edad');
        $particular->numero_de_identidad = $request->input('numero_de_identidad');
        $particular->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $particular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $particular->telefono = $request->input ('telefono');
        $particular->genero = $request->input ('genero');
        $particular->tipo="Particular";
        // Guardar los cambios
        $particular->save();

        // Redirigir a la lista de todos los estudiantes.
        $particular1 = Cliente::paginate(10);
        return back();


    }

    public function destroy($id) {
         Cliente::destroy($id);


        return redirect('particulares');
    }

    public function buscarParticular(Request $request){
        $busquedaPart = $request->input("busquedaPart");

        $particulares=Cliente::where("tipo","=","Particular")
        ->where("nombre","like","%".$busquedaPart."%")
            ->orWhere("fecha_de_ingreso","like","%".$busquedaPart."%")
            ->paginate(10);

        return view('particulares')->with('particulares', $particulares);

    }




}