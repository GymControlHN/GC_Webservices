<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Ruffier;
use Illuminate\Http\Request;


class RuffierController extends Controller
{
    //

    public function index($id)
    {
        $datos = Ruffier::where("id_cliente","=",$id)->paginate(10);
        $cliente = Cliente::find($id);
        return view('ruffiel',compact("datos","cliente"));


    }

    public function create($id)
    {
        $cliente = Cliente::find($id);
        return view('botonruffier')->with("id",$id)->with("cliente",$cliente);

    }

    public function store(Request $request)
    {

        $nuevosDatos = new Ruffier();

        $nuevosDatos->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevosDatos->pulso_r = $request->input('pulso1');
        $nuevosDatos->pulso_a = $request->input('pulso2');
        $nuevosDatos->pulso_d = $request->input('pulso3');
        $nuevosDatos->ruffiel = $request->input('ruffiel');
        $nuevosDatos->clasificacion = $request->input('clasificacion');
        $nuevosDatos->mvo2 = $request->input('mvo');
        $nuevosDatos->mvoreal = $request->input('mvor');
        $nuevosDatos->id_cliente=$request->input("id");

        $nuevosDatos->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','ingreso correcto');
        //   return redirect('ruffiel');

        return back();

    }

    /*   public function show(Ruffier $ruffier)
       {

       }*/

    public function edit($id,$id_cliente)
    {
        $antecedentes = Ruffier::findOrFail($id);
        $id_cliente = Cliente::findOrFail($id_cliente);
        return view('botonruffiereditar')-> with("antecedentes", $id_cliente)->with("id",$id_cliente);

    }

    public function update(Request $request, $id)
    {

        // Validar los datos

        /* $validatedData = $request->validate([
             'fecha_de_ingreso' => 'required|max:12|not null',
             'pulso_r' => 'required|numeric',
             'pulso_a' => 'required|numeric',
             'pulso_d' => 'required|numeric',
             'ruffiel' => 'required|float',
             'clasificacion' => 'string',
             'mvo2' => 'required|numeric',
             'mvoreal' => 'required|numeric',
         ]);*/
        // Buscar la instancia en la base de datos.

        $datonuevo = Ruffier::findOrFail($id);

        //Asignar los nuevos valores a los diferentes campos

        $datonuevo->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $datonuevo->pulso_r = $request->input('pulso1');
        $datonuevo->pulso_a = $request->input('pulso2');
        $datonuevo->pulso_d = $request->input('pulso3');
        $datonuevo->ruffiel = $request->input('ruffiel');
        $datonuevo->clasificacion = $request->input('leyenda');
        $datonuevo->mvo2 = $request->input('mvo');
        $datonuevo->mvoreal = $request->input('mvor');

        // Guardar los cambios
        $datonuevo->save();

        // Redirigir a la lista de todos los estudiantes.
        //return redirect('ruffiel');
        return $this->index($request->input("id_cliente"));


    }

    public function destroy($id)
    {
        Ruffier::destroy($id);

        // return redirect('ruffiel');
        return $this->index($id);

    }



    /*public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }*/



}


