<?php

namespace App\Http\Controllers\super;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Arrendamientos;
use App\Clinicas;
use App\Tarifas;
use Auth;

class ArrendamientosController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); 
    //  $this->middleware('super');
    }

    public function index()
    {
        return view('super.arrendamientos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinicas = Clinicas::all();
        $tarifas = Tarifas::all();
        return view('super.arrendamientos.create')
        ->with('clinicas',$clinicas)
        ->with('tarifas',$tarifas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            Arrendamientos::create($request->all());
            return response()->json([
                "mensaje" => "creado"
            ]);
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
        $arrendamiento = Arrendamientos::with('clinicas')->find($id);
        return view('super.arrendamientos.detalle')
        ->with('arrendamiento', $arrendamiento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //este modulo no se debe editar
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
        //este modulo no se debe editar
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

    function eliminarArrendamiento($id){
        $arrendamiento = Arrendamientos::find($id);
        if($arrendamiento->delete()){            
            return response()->json(["mensaje" => "Eliminado"]);
        }
        
    }

    function buscarTarifa($id){
        $tarifa = Tarifas::find($id);
        return response()->json(
            $tarifa->toArray()
        );
    }

    public function pagination(Request $request){
        if($request->ajax()){
            $arrendamiento = Arrendamientos::with('clinicas')->select('arrendamientos.*');
            return Datatables::of($arrendamiento)->make(true);
        }
    }

    function mostrarTarifas($id){
        $tarifa = Tarifas::find($id);
        return response()->json(
            $tarifa
        );
    }
}
