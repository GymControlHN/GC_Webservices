<?php

namespace App\Http\Controllers;
use App\Imc;
use Illuminate\Http\Request;
use DB;

class ImcController extends Controller
{
    public function index()
    {
        $antecedentes = Imc::paginate(10);
        //return view('imc', compact('antecedentes'));
       //antecedentes =DB::table('antecedentes')
       // ->join('antecedente','id_cliente','=','clientes_gym');

    return view('imc', compact('antecedentes'));

    }

    //public function mostrarIMCCliente($id){

      // $antecedentes = Imc::where("id_cliente","=",$id)->paginate(10);
       // return view('imc',compact("antecedentes"));

   // }




    public function create()

    {


        return view('botonimc' );

    }

    public function store(Request $request )

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
        //$nuevoImc->id_cliente=$request->input("id_cliente");
        $nuevoImc->fecha_de_ingreso = $request->input('fecha_de_ingreso');


        $nuevoImc->save();
        return redirect('imc');//->route('imc.ini');
    }

   // public function show(Imc $antecedenes)
   // {
        //$antecedente = Imc::findOrfail($id);
      //  return view('imc', compact("antecedente"));

  //  }


    public function edit($id )

    {
        $antecedente = Imc::findOrfail($id);
        return view('botonimceditar')-> with("antecedente", $antecedente);
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


        $nuevoImc->save();
        return redirect('imc');






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
        // $nuevoImc->id_cliente=$request->input("id_cliente");
        $nuevoImc->fecha_de_ingreso = $request->input('fecha_de_ingreso');
        $nuevoImc->save();
       return redirect('imc');



    }
    public function destroy($id)
    {
        Imc::destroy($id);

        return redirect('imc');


    }
}
