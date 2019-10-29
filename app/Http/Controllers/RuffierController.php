<?php

namespace App\Http\Controllers;

use App\Ruffier;
use Illuminate\Http\Request;

class RuffierController extends Controller
{
    //

    public function index()
    {
        $dato = Ruffier::paginate(10);
        return view('ruffiel')->with('datos',$dato);;
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

        $nuevosDatos->fecha = $request->input('fecha');
        $nuevosDatos->pulso_r = $request->input('pulso_r');
        $nuevosDatos->pulso_a = $request->input('pulso_a');
        $nuevosDatos->pulso_d = $request->input('pulso_d');
        $nuevosDatos->ruffier = $request->input('ruffier');
        $nuevosDatos->clasificacion = $request->input('clasificacion');
        $nuevosDatos->mvo2 = $request->input('mvo2');
        $nuevosDatos->mvoreal = $request->input('mvoreal');

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
            'ruffier' => 'required|numeric',
            'clasificacion' => 'required',
            'mvo2' => 'required|numeric',
            'mvoreal' => 'required|numeric',

        ]);

        // Buscar la instancia en la base de datos.
        $datonuevo = Ruffier::findOrFail($id);

        //Asignar los nuevos valores a los diferentes campos

        $datonuevo->fecha = $request->input('fecha');
        $datonuevo->pulso_r = $request->input('pulso_r');
        $datonuevo->pulso_a = $request->input('pulso_a');
        $datonuevo->pulso_d = $request->input('pulso_d');
        $datonuevo->ruffier = $request->input('ruffier');
        $datonuevo->clasificacion = $request->input('clasificacion');
        $datonuevo->mvo2 = $request->input('mvo2');
        $datonuevo->mvoreal = $request->input('mvoreal');

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
