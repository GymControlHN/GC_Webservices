<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Cliente;
use App\Grasa;
use App\Imc;
use App\Ruffier;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function index($id)
    {


        $cliente = Cliente::findOrFail($id);

        $imc = Imc::select(DB::raw("COUNT(*) as count , imc"))
            ->whereYear('created_at', date('Y'))
            ->where("id_cliente", '=', $id)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('imc');
        $grasa = Grasa::select(DB::raw("COUNT(*) as count , grasa"))
            ->whereYear('created_at', date('Y'))
            ->where("id_cliente", '=', $id)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('grasa');

        $ruffier = Ruffier::select(DB::raw("COUNT(*) as count , ruffiel"))
            ->whereYear('created_at', date('Y'))
            ->where("id_cliente", '=', $id)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('ruffiel');

        $chart = new UserChart();
        $chart->title("Estadisticas del usuario: " . $cliente->value("nombre"));
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('imc', 'line', $imc)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0',
        ]);
        $chart->dataset('Grasa', 'line', $grasa)->options([
            'fill' => 'true',
            'borderColor' => $chart->loaderColor,
        ]);

        $chart->dataset('Ruffiel', 'line', $ruffier)->options([
            'fill' => 'true',
            'borderColor' => '#71C1C5',
        ]);
        return view('graficos', compact('chart'))->with("cliente", $cliente);
    }

    //
}
