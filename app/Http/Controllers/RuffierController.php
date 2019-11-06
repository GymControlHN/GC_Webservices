<?php

namespace App\Http\Controllers;

use App\Ruffier;
use Illuminate\Http\Request;


class RuffierController extends Controller
{
    //

    public function index()
    {
        $dato = Ruffier::paginate();
        return view('ruffiel')->with('datos',$dato);


    }

    public function create()
    {
        return view('ruffiel');
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

        $nuevosDatos = new Ruffier();

        $nuevosDatos->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevosDatos->pulso_r = $request->input('pulso1');
        $nuevosDatos->pulso_a = $request->input('pulso2');
        $nuevosDatos->pulso_d = $request->input('pulso3');
        $nuevosDatos->ruffiel = $request->input('ruffiel');
        $nuevosDatos->clasificacion = $request->input('leyenda');
        $nuevosDatos->mvo2 = $request->input('mvo');
        $nuevosDatos->mvoreal = $request->input('mvor');

        $nuevosDatos->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','ingreso correcto');
        return redirect('ruffiel');

    }

    public function show(Ruffier $ruffier)
    {

    }

    public function edit($id)
    {
        $ruffier = Ruffier::findOrFail($id);
        return view('ruffiel')->with('ruffiel', $ruffier);

    }

    public function update(Request $request, $id)
    {

        // Validar los datos

        $validatedData = $request->validate([
            'fecha_de_ingreso' => 'required|max:12|not null',
            'pulso_r' => 'required|numeric',
            'pulso_a' => 'required|numeric',
            'pulso_d' => 'required|numeric',
            'ruffiel' => 'required|float',
            'clasificacion' => 'string',
            'mvo2' => 'required|numeric',
            'mvoreal' => 'required|numeric',

        ]);

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
        return redirect('ruffiel');


    }

    public function destroy($id)
    {
     Ruffier::destroy($id);

        return redirect('ruffiel');


    }

    public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }



    /*public function buscarEstudiante(Request $request){
        $busqueda = $request->input("busqueda");

        $estudiantes = Estudiante::where("nombre","like","%".$busqueda."%")
            ->orWhere("fecha_de_ingreso","like","%".$busqueda."%")
            ->paginate(10);

        return view('estudiantes')->with('estudiantes', $estudiantes);
    }*/



}
