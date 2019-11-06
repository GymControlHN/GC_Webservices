<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Grasa;
class GrasaController extends Controller
{
    public function index()
    {
        $grasa = Grasa::paginate(10);
        return view('grasa')->with('grasa_corporal', $grasa);
    }

    public function create()
    {
        return view('botongrasa');
    }
    public function store(Request $request) {

        $this -> validate ( $request ,[
            'fecha_de_ingreso'=>'required|numeric',
            'edad'=>'required|numeric|max:100|min:10',
            'imc'=>'required',
            'grasa'=>'',
            'leyenda'=>'',

        ]);

        $nuevoMedida = new Grasa();

        $nuevoMedida->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoMedida->pc_tricipital= $request->input('pc_tricipital');
        $nuevoMedida->pc_infraescapular = $request->input('pc_infraescapular');
        $nuevoMedida->pc_supra_iliaco = $request->input('pc_supra_iliaco');
        $nuevoMedida->pc_biciptal = $request->input('pc_biciptal');
        $nuevoMedida->edad = $request->input('edad');
        $nuevoMedida->imc = $request->input('imc');
        $nuevoMedida->grasa = $request->input('grasa');
        $nuevoMedida->leyenda = $request->input('leyenda');
        $nuevoMedida->save();

        // TODO redireccionar a una página con sentido.

        return view('grasa');

    }
    public function edit($id) {
        $grasa = Grasa::findOrFail($id);
       return view('botongrasa')->with('grasa',$grasa);

    }
    public function update(request $request, $id ) {
       /* $this -> validate ( $request ,[
            'fecha_de_ingreso'=>'required|numeric',
            'edad'=>'required|numeric|max:100|min:10',
            'imc'=>'required',
            'grasa'=>'',
            'leyenda'=>'',

        ]);  */

       $medida = Grasa::findOrfail($id);


        $medida->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $medida->pc_tricipital= $request->input('pc_tricipital');
        $medida->pc_infraescapular = $request->input('pc_infraescapular');
        $medida->pc_supra_iliaco = $request->input('pc_supra_iliaco');
        $medida->pc_biciptal = $request->input('pc_biciptal');
        $medida->edad = $request->input('edad');
        $medida->imc = $request->input('imc');
        $medida->grasa = $request->input('grasa');
        $medida->leyenda = $request->input('leyenda');


        $medida->save();
        return redirect('grasa');
    }
    public function destroy($id) {
        Grasa::destroy($id);

        return redirect('grasa');
    }

}

