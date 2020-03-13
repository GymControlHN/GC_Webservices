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
        session()->flashInput([]);
        return view('particulares')->with('particulares' , $clientes)->with('no',1);
    }

    public function create() {
        return view('particulares');
    }

    public function store(Request $request) {
        $this -> validate ( $request ,[
            'nombre'=>'required',
            'fecha_nacimiento'=>'required|max:'.date("Y-m-d",strtotime("-1825 days")),
            'identificacion'=>'required|unique:clientes_gym|max:9999999999999|numeric',
            'profesion_u_oficio'=>'required',
            'telefono'=>'required|unique:clientes_gym|max:99999999|numeric',
            'genero'=>'required',
            "imagen" => "required"
        ]);
        if(strtoupper($request->input("genero"))==="F"||strtoupper($request->input("genero"))==="M") {

            $imagen = $_FILES["imagen"]["name"];
            $ruta = $_FILES["imagen"]["tmp_name"];
            if($_FILES["imagen"]["name"]!=null) {
                $destino = "clientes_imagenes/" . $imagen;
                copy($ruta, $destino);
            } else{
                $imagen="";
            }
            $nuevoParticular = new Cliente();

        $nuevoParticular->nombre = $request->input('nombre');
        $nuevoParticular->fecha_nacimiento = $request->input('fecha_nacimiento');
        $nuevoParticular->identificacion = $request->input('identificacion');
        $nuevoParticular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $nuevoParticular->telefono = $request->input ('telefono');
        $nuevoParticular->id_carrera=1;
        $nuevoParticular->genero = $request->input ('genero');
        $nuevoParticular->id_tipo_cliente="3";
            $nuevoParticular->imagen=$imagen;
        $nuevoParticular->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return back()->with(["exito"=>"Se agregó exitosamente"]);
        }else{
            return back()->with("error","El genero ingresado no es el correcto");

        }
    }


    public function edit($id) {
        $clientes = Cliente::findOrFail($id);
        return view('particulares')->with('particulares',$clientes);

    }

    public function update(Request $request) {

        $this -> validate ( $request ,[
            'identificacion'=>'required|max:9999999999999|unique:clientes_gym,identificacion,'.$request->input("particular_id").'|numeric',
            'telefono'=>'required|max:99999999|unique:clientes_gym,telefono,'.$request->input("particular_id").'|numeric',
            'nombre'=>'required',
            'fecha_nacimiento'=>'required|max:'.date("Y-m-d",strtotime("-1825 days")),
            'profesion_u_oficio'=>'required',
            'genero'=>'required',
        ]);
        if(strtoupper($request->input("genero"))==="F"||strtoupper($request->input("genero"))==="M") {

            $imagen = $_FILES["imagen"]["name"];
            $ruta = $_FILES["imagen"]["tmp_name"];
            if ($_FILES["imagen"]["name"]) {
                $destino = "clientes_imagenes/" . $imagen;
                copy($ruta, $destino);
            } else {
                $imagen = "";
            }


            // Asignar los nuevos valores a los diferentes campos
        $particular = Cliente::findOrFail($request->input("particular_id"));
        $particular->nombre = $request->input('nombre');
        $particular->fecha_nacimiento = $request->input('fecha_nacimiento');
        $particular->identificacion = $request->input('identificacion');
        $particular->profesion_u_oficio = $request->input('profesion_u_oficio');
        $particular->telefono = $request->input ('telefono');
        $particular->id_carrera=1;
        $particular->genero = $request->input ('genero');
        $particular->id_tipo_cliente="3";
            $particular->imagen = $imagen;
        // Guardar los cambios
        $particular->save();

        // Redirigir a la lista de todos los estudiantes.
        $particular1 = Cliente::paginate(10);
        return back();


        }else{
            return back()->with("error","El genero ingresado no es el correcto");
        }
    }

    public function destroy(Request $request)
    {



        $imc=Imc::where("id_cliente","=",$request->input("id"));
        $grasa = Grasa::where("id_cliente","=",$request->input("id"));
        $ruffier = Ruffier::where("id_cliente","=",$request->input("id"));
        $pagos = PagoClientesP::where("id_cliente","=",$request->input("id"));

        if($imc->count()>0||$grasa->count()>0||$ruffier->count()>0||$pagos->count()>0){

            return back()->with(["error"=>"No se puede borrar
             el particular porque tiene datos ingresados"]);

        }else {
            $cliente=  Cliente::destroy($request->input("id"));

            if ($cliente){
                return back()->with(["exito" => "Se elimino exitosamente"]);
            }else{
                return back()->with(["error" => "El particular ingresado no existe"]);
            }
        }

    }

    public function buscarParticular(Request $request){
        $busquedaPartarticular = $request->input("busquedaParticular");

        $particulares=Cliente::where("id_tipo_cliente","=","3")
        ->where("nombre","like","%".$busquedaPartarticular."%")
            ->orWhere("created_at","like","%".$busquedaPartarticular."%")
            ->paginate(10);
        session()->flashInput($request->input());


        return view('particulares')->with('particulares', $particulares)->with('no',1);

    }




}
