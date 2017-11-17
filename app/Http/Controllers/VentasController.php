<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormGuardarVenta;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class VentasController extends Controller
{

    public function index(Request $request)
    {
        $fechaInicial=$request->input('fechaInicial');
        $fechaFinal=$request->input('fechaFinal');

        if (!isset($fechaInicial) or !isset($fechaInicial)){
            $fechaInicial=Carbon::now()->previous(Carbon::SATURDAY)->toDateString();
            $fechaFinal=Carbon::now()->next(Carbon::SATURDAY)->toDateString();
        }

        if (Auth::user()->rol->id===1){
            $ventas = Venta::where('for_users_id','=',Auth::user()->id)
                ->where('fecha_venta','>=',$fechaInicial)
                ->where('fecha_venta','<=',$fechaFinal)
                ->get();

            return view('ventas.index',compact('ventas','fechaInicial','fechaFinal'));
        }

        if (Auth::user()->rol->id===2){
            $ventas = Venta::where('fecha_venta','>=',$fechaInicial)
                ->where('fecha_venta','<=',$fechaFinal)
                ->get();

            return view('ventas.index',compact('ventas','fechaInicial','fechaFinal'));
        }



    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(FormGuardarVenta $request)
    {

        try{
            $venta = new Venta();

            $venta->fecha_venta = $request->input('periodo');
            $venta->tipo_linea = $request->input('tipo_linea');
            $venta->producto_vendido = $request->input('producto_vendido');
            $venta->movil_tigo = $request->input('mov_tigo');
            $venta->movil_portado = $request->input('mov_portado');
            $venta->valor_compra = $request->input('valor');

            $venta->tabla_dms_idpdv = (int) $request->input('idpdv');
            $venta->for_users_id = Auth::user()->id;

            $venta->save();


            return redirect()->back()->with('mensajeExito', 'Se Guardo correctamente');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al guardar - '.$ex->getMessage());
        }

    }

    public function reporte(Request $request)
    {
        Excel::filter('chunk')->load($request->file('sel_file')->getRealPath())->chunk(1000, function($results) use (&$activaMil)
        {
            foreach ($results as $result) {
                Venta::where('movil_tigo','=',$result->msisdn)->update(['validado' => true]);
            };
        });

        $ventas = Venta::where('fecha_venta','>=','2017-07-01')
            ->where('fecha_venta','<=','2017-07-08')
            ->where('validado','=',true)
        ->get();

        dd(count($ventas));

    }
}
