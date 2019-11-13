<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Imc;
use Illuminate\Http\Request;
use DB;

class ImcController extends Controller
{
    public function index($id)
    {
         $antecedentes = Imc::where("id_cliente","=",$id)->paginate(10);

         $cliente = Cliente::findOrfail($id);
         return view('imc',compact("antecedentes"))->with("cliente",$cliente);

    }

    //public function mostrarIMCCliente($id){

   // }




    public function create($id)

    {


        return view('botonimc' )->with("id",$id);

    }

    public function store(Request $request)

    {
    //   $antecedentes = request()->all();
      //  if(empty($antecedentes['id_cliente'])){

   //}


         $nuevoImc = new Imc();
        $nuevoImc->peso = $request->input('peso');
        $nuevoImc->altura = $request->input('altura');
        $nuevoImc->imc = $request->input('imc');
        $nuevoImc->leyenda = $request->input('leyenda');
        $nuevoImc->pecho = $request->input('pecho');
        $nuevoImc->brazo = $request->input('brazo');
        $nuevoImc->ABD_A = $request->input('ABD_A');
        $nuevoImc->ABD_B = $request->input('ABD_B');
        $nuevoImc->cadera = $request->input('cadera');
        $nuevoImc->muslo = $request->input('muslo');
        $nuevoImc->pierna = $request->input('pierna');
        $nuevoImc->id_cliente=$request->input("id");
        $nuevoImc->fecha_de_ingreso = $request->input('fecha_de_ingreso');


        $nuevoImc->save();

        return back();//->route('imc.ini');
    }

   // public function show(Imc $antecedenes)
   // {
        //$antecedente = Imc::findOrfail($id);
      //  return view('imc', compact("antecedente"));

  //  }


    public function edit($id,$id_cliente)

    {
        $antecedente = Imc::findOrfail($id);
        $id_cliente= Cliente::findOrFail($id_cliente);
        return view('botonimceditar')-> with("antecedente", $antecedente)->with("id",$id_cliente);
        //   $antecedentes = request()->all();
        //  if(empty($antecedentes['id_cliente'])){

        //}
        //return view('botonimceditar', compact($antecedente));

       //$nuevoImc= Imc::findOrfail($request->input('id_imc'));
       // $nuevoImc->peso = $request->input('peso');
       // $nuevoImc->altura = $request->input('altura');
        //$nuevoImc->imc = $request->input('imc');
        //$nuevoImc->leyenda = $request->input('leyenda');
        //$nuevoImc->pecho = $request->input('pecho');
        //$nuevoImc->brazo = $request->input('brazo');
        //$nuevoImc->ABD_A = $request->input('ABD_A');
        //$nuevoImc->ABD_B = $request->input('ABD_B');
        //$nuevoImc->cadera = $request->input('cadera');
        //$nuevoImc->muslo = $request->input('muslo');
        //$nuevoImc->pierna = $request->input('pierna');
        // $nuevoImc->id_cliente=$request->input("id_cliente");
        //$nuevoImc->fecha_de_ingreso = $request->input('fecha_de_ingreso');


       // $nuevoImc->save();
        //return back();






    }

    public function update(Request $request, $id)
    {

      // $nuevoImc= Imc::findOrfail($request->input('id_imc'));
      // $nuevoImc = new Imc();
        $nuevoImc = Imc::findOrfail($id);
        $nuevoImc->peso = $request->input('peso');
        $nuevoImc->altura = $request->input('altura');
        $nuevoImc->imc = $request->input('imc');
        $nuevoImc->leyenda = $request->input('leyenda');
        $nuevoImc->pecho = $request->input('pecho');
        $nuevoImc->brazo = $request->input('brazo');
        $nuevoImc->ABD_A = $request->input('ABD_A');
        $nuevoImc->ABD_B = $request->input('ABD_B');
        $nuevoImc->cadera = $request->input('cadera');
        $nuevoImc->muslo = $request->input('muslo');
        $nuevoImc->pierna = $request->input('pierna');
         $nuevoImc->id_cliente=$request->input("id_cliente");
        $nuevoImc->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoImc->save();

         return $this->index($request->input("id_cliente"));


    }
    public function destroy($id)
    {
        Imc::destroy($id);

        return $this->index($id);




    }
}
