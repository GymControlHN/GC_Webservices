<?php

namespace App\Http\Controllers;


use App\Particular;
use Illuminate\Http\Request;

class ParticularesController extends Controller
{
    public function index () {
        $particulares = Particular::paginate(10);
        return view('particulares')->with('particulares' , $particulares);
    }

    public function create() {
        return view('particulares');
    }

    public function store(Request $request) {
        // $request->validate([
        // 'nombre' =>'required',
        //   'edad' =>'required',
        //   'numero_de_cuenta' =>'required',
        //  'fecha_de_ingreso' =>'required',
        //  'profesion_u_oficio' =>'required',
        //   'telefono' =>'required',
        //  ]);

        $nuevoParticular = new Particular();

        $nuevoParticular->nombre = $request->input('nombre');
        $nuevoParticular->edad = $request->input('edad');
        $nuevoParticular->numero_de_identidad = $request->input('numero_de_identidad');
        $nuevoParticular->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoParticular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $nuevoParticular->telefono = $request->input ('telefono');

        $nuevoParticular->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return redirect('/particulares');
    }
    public function show(Particular $particulares)
    {
        //
    }

    public function edit($id) {
        $particulares = Particular::findOrFail($id);
        return view('particulares')->with('particulares',$particulares);

    }

    public function update(Request $request, $id) {

        // Validar los datos
        $validatedData = $request->validate([
            'nombre'=>'required|max:50',
            'edad'=>'required|numeric|max:100|min:10',
            'numero_de_identidad'=>'required|numeric',
            'fecha_de_ingreso'=>'required|max:10',
            'profesion_u_oficio'=>'required',
            'telefono'=>'required|numeric|max:8',

        ]);

        // Buscar la instancia en la base de datos.
        $particular = Particular::findOrFail($id);

        // Asignar los nuevos valores a los diferentes campos
        $particular->nombre = $request->input('nombre');
        $particular->edad = $request->input('edad');
        $particular->numero_de_cuenta = $request->input('numero_de_identidad');
        $particular->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $particular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $particular->telefono = $request->input ('telefono');

        // Guardar los cambios
        $particular->save();

        // Redirigir a la lista de todos los estudiantes.
        return redirect('particulares');


    }

    public function destroy($id) {
         Particular::destroy($id);


        return redirect('particulares');
    }

    public function buscarParticular(Request $request){
        $busquedaPart = $request->input("busquedaPart");

        $particulares=Particular::where("nombre","like","%".$busquedaPart."%")
            ->orWhere("fecha_de_ingreso","like","%".$busquedaPart."%")
            ->paginate(10);

        return view('particulares')->with('particulares', $particulares);

    }


}
