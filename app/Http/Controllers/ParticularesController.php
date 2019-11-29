<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Grasa;
use App\Imc;
use App\PagoClientesP;
use App\Ruffier;
use Illuminate\Http\Request;

class ParticularesController extends Controller
{
    public function index () {
        $clientes = Cliente::where("id_tipo_cliente","=",3)
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
            'identificacion'=>'required',
            'fecha_de_ingreso'=>'required',
            'profesion_u_oficio'=>'required',
            'telefono'=>'required',
            'genero'=>'required',
        ]);

        $nuevoParticular = new Cliente();

        $nuevoParticular->nombre = $request->input('nombre');
        $nuevoParticular->edad = $request->input('edad');
        $nuevoParticular->identificacion = $request->input('identificacion');
        $nuevoParticular->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoParticular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $nuevoParticular->telefono = $request->input ('telefono');
        $nuevoParticular->id_carrera=1;
        $nuevoParticular->genero = $request->input ('genero');
        $nuevoParticular->id_tipo_cliente="3";
        $nuevoParticular->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return back()->with(["exito"=>"Se agregó exitosamente"]);
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
        $particular->identificacion = $request->input('identificacion');
        $particular->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $particular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $particular->telefono = $request->input ('telefono');
        $particular->id_carrera=1;
        $particular->genero = $request->input ('genero');
        $particular->id_tipo_cliente="3";
        // Guardar los cambios
        $particular->save();

        // Redirigir a la lista de todos los estudiantes.
        $particular1 = Cliente::paginate(10);
        return back();


    }

    public function destroy(Request $request)
    {



        $imc=Imc::where("id_cliente","=",$request->input("id"));
        $grasa = Grasa::where("id_cliente","=",$request->input("id"));
        $ruffier = Ruffier::where("id_cliente","=",$request->input("id"));
        $pagos = PagoClientesP::where("id_cliente","=",$request->input("id"));

        if($imc->count()>0||$grasa->count()>0||$ruffier->count()>0||$pagos->count()>0){

            return back()->with(["error"=>"No se puede borrar
             el particular porque tiene registros de pagos, imc,grasa o ruffier"]);

        }else {
            Cliente::destroy($request->input("id"));

            return back()->with(["exito" => "Se elimino exitosamente"]);
        }

    }

    public function buscarParticular(Request $request){
        $busquedaPart = $request->input("busquedaPart");

        $particulares=Cliente::where("id_tipo_cliente","=","3")
        ->where("nombre","like","%".$busquedaPart."%")
            ->orWhere("fecha_de_ingreso","like","%".$busquedaPart."%")
            ->paginate(10);

        return view('particulares')->with('particulares', $particulares);

    }




}
