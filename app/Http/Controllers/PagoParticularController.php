<?php

namespace App\Http\Controllers;

use App\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\PagoClientesP;

class PagoParticularController extends Controller
{
    public function index($id){
        $pagos = PagoClientesP::where("tipo_pago","=","Pago_Particular")
            ->where("id_cliente","=",$id)
            ->orderBy("fecha_pago", "asc")
            ->get()
            ->groupBy(function ($item) {
                return strtolower(Carbon::createFromFormat("Y-m-d", $item->fecha_pago, null)->year);
            });
        $nombre = Cliente::findOrfail($id);

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
        $nuevoPagoClientee->id_cliente = $request->input("id");

            $nuevoPagoClientee->save();

        //TODO redireccionar a una página con sentido.
        //Seccion::flash('message','Estudiante creado correctamente');
        return back()->with(["exito"=>"Se agregó exitosamente"]);
        return $this->index($request->input("id"));

    }

    public function show(PagoClientesp $pagoClientes)
    {

    }

    public function edit($id)
    {
        $pagoPart = PagoClientesP::findOrFail($id);
        return view('pagosparticulares')->with('pagos', $pagoPart);

    }

    public function update(Request $request)
    {

        $user = PagoClientesP::findOrfail($request->input("pagoPart_id"));
        $user->mes = $request->input("mes");
        $user->fecha_pago = $request->input("fecha_pago");

        $user->save();

        $pagosparticular1 = PagoClientesP::paginate(10);
        return back();
    }


    public function destroy($id,$id_cliente)
    {
        PagoClientesP::destroy($id);
        return $this->index($id_cliente);

        return back()->with(["exito"=>"Se elimino exitosamente"]);
    }

}


