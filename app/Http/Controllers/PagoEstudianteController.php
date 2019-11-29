<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\PagoClientesP;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagoEstudianteController extends Controller
{
    public function index($id)
    {
        $pagos = PagoClientesP::where("tipo_pago", "=", "Pago_Estudiante")
            ->where("id_cliente", "=", $id)
            ->orderBy("fecha_pago", "asc")
            ->get()
            ->groupBy(function ($item) {
                return strtolower(Carbon::createFromFormat("Y-m-d", $item->fecha_pago, null)->year);
            });

        $nombre = Cliente::findOrfail($id);

        return view('pagosestudiantes', compact("pagos"))
            ->with("nombre", $nombre);
    }

    public function create()
    {
        return view('pagosestudiantes');
    }

    public function store(Request $request)
    {
        $nuevoPagoCliente = new PagoClientesp();

        $nuevoPagoCliente->mes = $request->input('mes');

        $verificarFecha = PagoClientesP::where("fecha_pago",
            "like", "%" . $request->input('fecha_pago') . "%")
        ->where("id_cliente","=",$request->input("id"));

        if ($verificarFecha->count() > 0) {
            return back()->with("error", "La fecha ingresada de pago ya existe");
        } else {

            $nuevoPagoCliente->fecha_pago = $request->input('fecha_pago');
            $nuevoPagoCliente->tipo_pago = "Pago_Estudiante";
            $nuevoPagoCliente->id_cliente = $request->input("id");


            $nuevoPagoCliente->save();

            //TODO redireccionar a una página con sentido.
            //Seccion::flash('message','Estudiante creado correctamente');
            return back()->with(["exito" => "Se agregó exitosamente"]);
        }
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
        $user->fecha_pago = $request->input("fecha_pago");

        $user->save();

        $pagosestudiante1 = PagoClientesP::paginate(10);
        return back();


    }

    public function destroy($id, $id_cliente)
    {

        PagoClientesP::destroy($id);
        return $this->index($id_cliente);

        return back()->with(["exito" => "Se elimino exitosamente"]);

    }

    public function buscarPagos(Request $request)
    {
        $busquedaPagos = $request->input("busquedaPago");

        $pagoestudiantes = PagoClientes::where("mes", "like", "%" . $busquedaPagos . "%")
            ->orWhere("fecha_pago", "like", "%" . $busquedaPagos . "%")
            ->paginate(10);

        return view('pagoestudiantes')->with('pagoestudiantes', $pagoestudiantes);

    }


}

