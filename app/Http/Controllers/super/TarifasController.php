<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use Datatables;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tarifas;
use Auth;

class TarifasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $tarifas=Tarifas::paginate(10);
        return view('super.tarifas.index')
        ->with('tarifas',$tarifas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super.tarifas.create');
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
            Tarifas::create($request->all());
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
        $tarifa = Tarifas::find($id);
        return view('super.tarifas.detalle')->with('tarifa', $tarifa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifa = Tarifas::find($id);
        return view('super.tarifas.edit')->with('tarifa', $tarifa);
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
        $tarifa = Tarifas::find($id);
        $tarifa->fill($request->all());
        $tarifa->save();
        return response()->json([
            "mensaje" => "listo" 
        ]);
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

    function eliminarTarifa($id){
        $tarifa = Tarifas::find($id);
        $tarifa->delete();
        return response()->json(["mensaje" => "Eliminado"]);
    }

    public function pagination(Request $request){
      if($request->ajax()){
         return Datatables::of(Tarifas::all())->make(true);
         //return app('datatables')->eloquent(Clinicas::all())->make(true);
        // return $datatables->eloquent(User::where('tipo','2'))->make(true);
     }
 }
}
