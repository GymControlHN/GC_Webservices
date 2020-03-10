<?php

namespace App\Http\Controllers;
use App\Charts\UserChart;

use App\Cliente;
use App\Imc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImcController extends Controller
{
    public function index($id)
    {
         $antecedentes =
             Imc::join("diagnostico_imcs",
                 "antecedentes.id_diagnostico","=","diagnostico_imcs.id")
                 ->where("id_cliente","=",$id)
                 ->select("antecedentes.*","diagnostico_imcs.diagnostico")
             ->orderBy("created_at","desc")->paginate(10);


        $imc = Imc::select(DB::raw("COUNT(*) as count , imc"))
            ->whereYear('created_at', date('Y'))
            ->where("id_cliente", '=', $id)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('imc');


         $cliente = Cliente::findOrfail($id);

        $chart = new UserChart();
        $chart->title("Estadisticas del usuario: " . $cliente->value("nombre"));
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);

        $chart->dataset('imc', 'line', $imc)->options([
            'fill' => 'false',
            'borderColor' => '#00FF00',
        ]);




         return view('imc',compact("antecedentes","chart"))->with("cliente",$cliente)->with('no',1);




    }

    //public function mostrarIMCCliente($id){

   // }




    public function create($id)

    {

        $cliente = Cliente::find($id);

        $now = Carbon::now();
        return view('botonimc' )->with("id",$id)->with("now", $now )->with("cliente",$cliente);

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
        $nuevoImc->id_diagnostico = $request->input('id_diagnostico');
        $nuevoImc->pecho = $request->input('pecho');
        $nuevoImc->brazo = $request->input('brazo');
        $nuevoImc->ABD_A = $request->input('ABD_A');
        $nuevoImc->ABD_B = $request->input('ABD_B');
        $nuevoImc->cadera = $request->input('cadera');
        $nuevoImc->muslo = $request->input('muslo');
        $nuevoImc->pierna = $request->input('pierna');
        $nuevoImc->id_cliente=$request->input("id");


        $nuevoImc->save();

        return $this->index( $request->input("id"));

       //->route('imc.ini');
    }

   // public function show(Imc $antecedenes)
   // {
        //$antecedente = Imc::findOrfail($id);
      //  return view('imc', compact("antecedente"));

  //  }


    public function edit($id,$id_cliente)

    {

        $cliente = Cliente::findOrfail($id_cliente);
        $antecedente = Imc::findOrfail($id);
        $id_cliente= Cliente::findOrFail($id_cliente);
        return view('botonimceditar')
            -> with("antecedente", $antecedente)
            ->with("id",$id_cliente)->with("cliente",$cliente);
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
        $nuevoImc->id_diagnostico = $request->input('id_diagnostico');
        $nuevoImc->pecho = $request->input('pecho');
        $nuevoImc->brazo = $request->input('brazo');
        $nuevoImc->ABD_A = $request->input('ABD_A');
        $nuevoImc->ABD_B = $request->input('ABD_B');
        $nuevoImc->cadera = $request->input('cadera');
        $nuevoImc->muslo = $request->input('muslo');
        $nuevoImc->pierna = $request->input('pierna');
         $nuevoImc->id_cliente=$request->input("id_cliente");
        $nuevoImc->save();

         return $this->index($request->input("id_cliente"));


    }
    public function destroy(Request $request)
    {
        Imc::destroy($request->input("id"));

        return $this->index($request->input("id_cliente"));
    }


}
