<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\PagoClientesP;

class PagoParticularController extends Controller
{

    public function index()
    {
        $pagos = PagoClientesP::orderBy("fecha_pago", "asc")
            ->get()
            ->groupBy(function ($item) {
                return strtolower(Carbon::createFromFormat("Y-m-d", $item->fecha_pago, null)->year);
            });
        return view('pagosparticulares', compact("pagos"));
    }

    public function create()
    {
        return view('pagosparticulares');
    }

    public function store(Request $request)
    {
        $nuevoPagoCliente = new PagoClientesp();

        $nuevoPagoCliente->mes = $request->input('mes');
        $nuevoPagoCliente->fecha_pago = $request->input('fecha_pago');

        $nuevoPagoCliente->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return redirect('pagosparticulares');

    }

    public function show(PagoClientes $pagoClientes)
    {

    }

    public function destroy($id)
    {
        Estudiante::destroy($id);

        return redirect('pagosparticulares');
    }
}

