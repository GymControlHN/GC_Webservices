<?php

namespace App\Http\Controllers;


use App\Cliente;

use Illuminate\Http\Request;
use App\Grasa;
use DB;

class GrasaController extends Controller
{
    public function index( $id)
    {

        $grasa_corporal = Grasa::where("id_cliente","=",$id)->paginate(10);

        $nombre = Cliente::findOrfail($id);
        return view('grasa',compact("grasa_corporal"))->with("nombre",$nombre);

        //$grasa_corporal = Grasa
           // ::where("id_cliente", "=", $request->input("id_cliente"));
        //$nombre = Cliente::findOrfail($id);
       // return view('grasa', compact("grasa_corporal"))->with("nombre", $nombre);
    }


    public function create($id)

    {


        return view('botongrasa' )->with("id",$id);

    }


    public function store(Request $request)
    {


        $nuevoMedida = new Grasa();

        $nuevoMedida->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoMedida->pc_tricipital = $request->input('pc_tricipital');
        $nuevoMedida->pc_infraescapular = $request->input('pc_infraescapular');
        $nuevoMedida->pc_supra_iliaco = $request->input('pc_supra_iliaco');
        $nuevoMedida->pc_biciptal = $request->input('pc_biciptal');
        $nuevoMedida->edad = $request->input('edad');
        $nuevoMedida->imc = $request->input('imc');
        $nuevoMedida->grasa = $request->input('grasa');
        $nuevoMedida->id_cliente=$request->input("id");
        $nuevoMedida->leyenda = $request->input('leyenda');
        $nuevoMedida->save();

        // TODO redireccionar a una página con sentido.

        return back();

    }

    public function edit($id,$id_cliente)

    {
        $grasa = Grasa::findOrfail($id);
        $id_cliente= Cliente::findOrFail($id_cliente);
        return view('botongrasaeditar')-> with("grasa", $grasa)->with("id",$id_cliente);

    }

    public function update(request $request, $id)
    {
        /* $this -> validate ( $request ,[
             'fecha_de_ingreso'=>'required|numeric',
             'edad'=>'required|numeric|max:100|min:10',
             'imc'=>'required',
             'grasa'=>'',
             'leyenda'=>'',

         ]);  */

        $medida = Grasa::findOrfail($id);


        $medida->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $medida->pc_tricipital = $request->input('pc_tricipital');
        $medida->pc_infraescapular = $request->input('pc_infraescapular');
        $medida->pc_supra_iliaco = $request->input('pc_supra_iliaco');
        $medida->pc_biciptal = $request->input('pc_biciptal');
        $medida->edad = $request->input('edad');
        $medida->imc = $request->input('imc');
        $medida->grasa = $request->input('grasa');
        $medida->leyenda = $request->input('leyenda');
        $medida->id_cliente=$request->input("id_cliente");


        $medida->save();
        return $this->index($request->input("id_cliente"));
    }

    public function destroy($id)
    {
        Grasa::destroy($id);

        return redirect('grasa');
    }

}

