<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Grasa;
use App\Imc;
use App\PagoClientes;
use App\PagoClientesP;
use App\Ruffier;
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
        return view('estudiantes')->with('estudiantes', $clientes)->with("carreras",$carrera)->with("no", 1);
    }

    public function create($id)
    {
        $now = Carbon::now();
        return view('estudiantes')->with("id", $id)->with("now", $now);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'identificacion'=>'required|unique:clientes_gym|max:13',
         'telefono'=>'required|unique:clientes_gym|max:99999999',
          'nombre'=>'required',
          'carrera'=>'required',
          'genero'=>'required',
        ]);
        if(strtoupper($request->input("genero"))==="F"||strtoupper($request->input("genero"))==="M") {


            $nuevoEstudiante = new Cliente();

            $nuevoEstudiante->nombre = $request->input('nombre');
            $nuevoEstudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
            $nuevoEstudiante->identificacion = $request->input('identificacion');
            $nuevoEstudiante->fecha_de_ingreso = $request->input('fecha_de_ingreso');
            $nuevoEstudiante->id_carrera = $request->input('carrera');
            $nuevoEstudiante->telefono = $request->input('telefono');
            $nuevoEstudiante->id_tipo_cliente = "1";
            $nuevoEstudiante->genero = strtoupper($request->input("genero"));

            $nuevoEstudiante->save();

            //TODO redireccionar a una página con sentido.
            //Seccion::flash('message','Estudiante creado correctamente');

            return back()->with(["exito" => "Se agregó exitosamente"]);

        }else{
            return back()->with("error","El genero ingresado no es el correcto");

        }
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


       $this->validate($request,[
            'identificacion'=>'required|max:13|unique:clientes_gym,identificacion,'.$request->input("estudiante_id"),
            'telefono'=>'required|max:99999999|unique:clientes_gym,telefono,'.$request->input("estudiante_id"),
            'nombre'=>'required',
            'carrera'=>'required',
            'genero'=>'required',
        ]);

       if(strtoupper($request->input("genero"))==="F"||strtoupper($request->input("genero"))==="M") {


           // Buscar la instancia en la base de datos.
           $estudiantes = Cliente::findOrfail($request->input("estudiante_id"));
           $estudiantes->nombre = $request->input("nombre");
           $estudiantes->fecha_nacimiento = $request->input("fecha_nacimiento");
           $estudiantes->identificacion = $request->input("identificacion");
           $estudiantes->id_carrera = $request->input("carrera");
           $estudiantes->telefono = $request->input("telefono");
           $estudiantes->id_tipo_cliente = "1";
           $estudiantes->genero = strtoupper($request->input("genero"));

           $estudiantes->save();

           $estudiantes1 = Cliente::paginate(10);
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
             el estudiante porque tiene datos ingresados"]);

        }else {
           $cliente=  Cliente::destroy($request->input("id"));

            if ($cliente){
                return back()->with(["exito" => "Se elimino exitosamente"]);
            }else{
                return back()->with(["error" => "El estudiante ingresado no existe"]);
            }

        }

    }

    public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");


        $carrera = Carrera::all();

        $clientes = Cliente:: where("id_tipo_cliente","=","1")
            ->join("carreras","clientes_gym.id_carrera","=","carreras.id")
            ->select("clientes_gym.*","carreras.carrera")
        ->where("nombre","like","%".$busqueda."%")
            ->orWhere("created_at","like","%".$busqueda."%")
            ->paginate(10);
        $carrera = Carrera::all();

        return view('estudiantes')->with('estudiantes', $clientes)->with("carreras",$carrera);
    }





    /*public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }*/





}
