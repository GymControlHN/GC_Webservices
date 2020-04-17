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

        $totalPagosEstudiantes = PagoClientesP::where("tipo_pago","=","Pago_Estudiante")->count();

        $totalIngresoEstudiante= $totalPagosEstudiantes *100;



        $nombre = Cliente::findOrfail($id);

        return view('pagosestudiantes', compact("pagos"))
            ->with("nombre", $nombre)->with('no',1)->withIngresos($totalIngresoEstudiante);
    }

    public function create()
    {
        return view('pagosestudiantes');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nota'=>'required',

    ]);

        $nuevoPagoCliente = new PagoClientesP();

        $nuevoPagoCliente->mes = $request->input('mes');
        $nuevoPagoCliente->nota = $request->input('nota');
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

    public function show(PagoClientesP $pagoClientes)
    {

    }


    public function edit($id)
    {
        $pagos = PagoClientesP::findOrFail($id);
        return view('pagosestudiantes')->with('pagos', $pagos);

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nota' => 'required',
            'fecha_pago' => 'required',
            'mes'=> 'required'
            ]);
        $user = PagoClientesP::findOrfail($request->input("estudiantepago_id"));
        $user->fecha_pago = $request->input("fecha_pago");
        $user->mes = $request->input("mes");
        $user->nota = $request->input("nota");
        $user->save();

        $pagosestudiante1 = PagoClientesP::paginate(10);
        return back();


    }

    public function destroy(Request $request)
    {

        PagoClientesP::destroy($request->input("id"));

        return $this->index($request->input("id_cliente"));

    }

    public function buscarPagos(Request $request)
    {
        $busquedaPagos = $request->input("busquedaPago");

        $pagoestudiantes = PagoClientesP::where("mes", "like", "%" . $busquedaPagos . "%")
            ->orWhere("fecha_pago", "like", "%" . $busquedaPagos . "%")
            ->paginate(10);

        return view('pagoestudiantes')->with('pagoestudiantes', $pagoestudiantes);

    }


}

