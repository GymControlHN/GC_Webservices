<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\PagoClientes;
use App\PagoClientesP;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagoEstudianteController extends Controller
{
    public function index (Request $request,$id)
    {
        $pagos = PagoClientesP::where("tipo_pago", "=", "Pago_Estudiante")
            ->where("id_cliente", "=",$id)
            ->orderBy("fecha_pago", "asc")
            ->get()
            ->groupBy(function ($item) {
                return strtolower(Carbon::createFromFormat("Y-m-d", $item->fecha_pago, null)->year);
            });

        $nombre = Cliente::findOrfail($id);

        return view('pagosestudiantes', compact("pagos"))
            ->with("nombre", $nombre);
    }

    public function create() {
        return view('pagosestudiantes');
    }

    public function store(Request $request) {
        $nuevoPagoCliente = new PagoClientesp();

        $nuevoPagoCliente->mes = $request->input('mes');
        $nuevoPagoCliente->fecha_pago = $request->input('fecha_pago');
        $nuevoPagoCliente->tipo_pago = "Pago_Estudiante";
        $nuevoPagoCliente->id_cliente= $request->input("id");

        $nuevoPagoCliente->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return back()->with(["exito"=>"Se agregó exitosamente"]);

    }
    public function show(PagoClientesp $pagoClientes)
    {

    }



    public function edit($id)
    {
        $pagoEst = PagoClientesP::findOrFail($id);
        return view('pagosestudiantes')->with('pagos', $pagoEst);

    }

    public function update(Request $request)
    {

        $user = PagoClientesP::findOrfail($request->input("pagoEst_id"));
        $user->mes=$request->input("mes");
        $user->fecha_pago = $request->input("fecha_pago");

        $user->save();

        $pagosestudiante1 = PagoClientesP::paginate(10);
        return back();


    }

    public function destroy($id) {
        PagoClientesP::destroy($id);

        return redirect('pagosestudiantes');

        return back()->with(["exito"=>"Se elimino exitosamente"]);

    }



















    public function buscarPagos(Request $request){
        $busquedaPagos = $request->input("busquedaPago");

        $pagoestudiantes=PagoClientes::where("mes","like","%".$busquedaPagos."%")
            ->orWhere("fecha_pago","like","%".$busquedaPagos."%")
            ->paginate(10);

        return view('pagoestudiantes')->with('pagoestudiantes', $pagoestudiantes);

    }






}

