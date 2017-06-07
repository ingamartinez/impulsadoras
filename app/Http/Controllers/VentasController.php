<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormGuardarVenta;
use App\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol->id===1){
            $ventas = Venta::where('for_users_id',Auth::user()->id)->get();

            return view('ventas.index',compact('ventas'));
        }

        if (Auth::user()->rol->id===2){
            $ventas = Venta::all();

            return view('ventas.index',compact('ventas'));
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
