<?php

namespace App\Http\Controllers;

use App\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\PagoClientesP;

class PagoParticularController extends Controller
{
    public function index(Request $request){
        $pagos = PagoClientesP::where("tipo_pago","=","Pago_Particular")
            ->where("id_cliente", "=", $request->input("id_cliente"))
            ->orderBy("fecha_pago", "asc")
            ->get()
            ->groupBy(function ($item) {
                return strtolower(Carbon::createFromFormat("Y-m-d", $item->fecha_pago, null)->year);
            });
        $nombre = Cliente::findOrfail($request->input("id_cliente"));

        return view('pagosparticulares', compact("pagos"))
            ->with("nombre", $nombre);
    }

    public function create()
    {
        return view('pagosparticulares');
    }

    public function store(Request $request)
    {
        $nuevoPagoClientee = new PagoClientesp();

        $nuevoPagoClientee->mes = $request->input('mes');
        $nuevoPagoClientee->fecha_pago = $request->input('fecha_pago');
        $nuevoPagoClientee->tipo_pago = "Pago_Particular";


            $nuevoPagoClientee->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return redirect('pagosparticulares');

    }

    public function show(PagoClientes $pagoClientes)
    {

    }

    public function destroy($id)
    {
        PagoClientesP::destroy($id);

        return redirect('pagosparticulares');
    }
}

