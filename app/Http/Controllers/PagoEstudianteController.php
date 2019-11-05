<?php

namespace App\Http\Controllers;

use App\PagoClientesP;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagoEstudianteController extends Controller
{
    public function index () {
        $pagos = PagoClientesP::where("tipo_pago","=","Pago_Estudiante")
            ->orderBy("fecha_pago","asc")
            ->get()
            ->groupBy(function ($item){
                return  strtolower(Carbon::createFromFormat("Y-m-d", $item->fecha_pago,null)->year);
            });
        return view('pagosestudiantes',compact("pagos"));
    }

    public function create() {
        return view('pagosestudiantes');
    }

    public function store(Request $request) {
        $nuevoPagoCliente = new PagoClientesp();

        $nuevoPagoCliente->mes = $request->input('mes');
        $nuevoPagoCliente->fecha_pago = $request->input('fecha_pago');
        $nuevoPagoCliente->tipo_pago = "Pago_Estudiante";

        $nuevoPagoCliente->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return back()->with(["exito"=>"Se agregó exitosamente"]);

    }
    public function show(PagoClientesp $pagoClientes)
    {

    }

    public function destroy($id) {
        PagoClientesP::destroy($id);

        return back()->with(["exito"=>"Se elimino exitosamente"]);

    }

}

