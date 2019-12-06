<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Imc;
use App\Ruffier;
use Carbon\Carbon;
use Illuminate\Http\Request;


class RuffierController extends Controller
{
    //

    public function index($id)
    {
        $datos = Ruffier::where("id_cliente","=",$id)
            ->orderBy("created_at","desc")->paginate(10);
        $cliente = Cliente::find($id);
        return view('ruffiel',compact("datos"))->with("cliente", $cliente)->with("no", 1);


    }

    public function create($id)
    {

        $now = Carbon::now();
        $cliente = Cliente::find($id);
        $imc = Imc::where("id_cliente", "=", $id)->latest("updated_at")->first();
        return view('botonruffier')->with("id",$id)->with("cliente",$cliente)->with("imc",$imc)->with("now", $now );

    }

    public function store(Request $request)
    {

        $nuevosDatos = new Ruffier();

        $nuevosDatos->pulso_r = $request->input('pulso_r');
        $nuevosDatos->pulso_a = $request->input('pulso_a');
        $nuevosDatos->pulso_d = $request->input('pulso_d');
        $nuevosDatos->ruffiel = $request->input('ruffiel');
        $nuevosDatos->leyenda = $request->input('leyenda');
        $nuevosDatos->mvo = $request->input('mvo');
        $nuevosDatos->mvoreal = $request->input('mvoreal');
        $nuevosDatos->mvodiagnostico = $request->input('mvodiagnostico');
        $nuevosDatos->id_cliente=$request->input("id");

        $nuevosDatos->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','ingreso correcto');
        //   return redirect('ruffiel');

        return $this->index( $request->input("id"));

    }

    /*   public function show(Ruffier $ruffier)
       {

       }*/

    public function edit($id,$id_cliente)
    {

        $cliente = Cliente::find($id);
        $rufierr = Ruffier::findOrFail($id);
        $id_cliente = Cliente::findOrFail($id_cliente);
        return view('botonruffiereditar')-> with("dato", $rufierr)->with("id",$id_cliente)->with("cliente",$cliente);

    }

    public function update(Request $request, $id)
    {



        $datonuevo = Ruffier::findOrFail($id);

        //Asignar los nuevos valores a los diferentes campos

        $datonuevo->pulso_r = $request->input('pulso_r');
        $datonuevo->pulso_a = $request->input('pulso_a');
        $datonuevo->pulso_d = $request->input('pulso_d');
        $datonuevo->ruffiel = $request->input('ruffiel');
        $datonuevo->leyenda = $request->input('leyenda');
        $datonuevo->mvo = $request->input('mvo');
        $datonuevo->mvoreal = $request->input('mvoreal');
        $datonuevo->mvodiagnostico = $request->input('mvodiagnostico');

        // Guardar los cambios
        $datonuevo->save();

        // Redirigir a la lista de todos los estudiantes.
        //return redirect('ruffiel');
      return $this->index($request->input("id_cliente"));


    }

    public function destroy(Request $request)
    {
        Ruffier::destroy($request->input("id"));

        return $this->index($request->input("id_cliente"));
    }





    /*public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }*/



}


